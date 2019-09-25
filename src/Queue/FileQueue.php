<?php
/**
 * @author Bram Gerritsen <bgerritsen@emico.nl>
 * @copyright (c) Emico B.V. 2017
 */

namespace Emico\RobinHqLib\Queue;


use DirectoryIterator;
use Emico\RobinHqLib\Service\EventProcessingService;
use Psr\Log\LoggerInterface;

class FileQueue implements QueueInterface
{
    /**
     * @var string
     */
    private $directory;

    /**
     * @var EventProcessingService
     */
    private $eventProcessingService;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param string $directory
     * @param EventProcessingService $eventProcessingService
     * @param LoggerInterface $logger
     */
    public function __construct(string $directory, EventProcessingService $eventProcessingService, LoggerInterface $logger)
    {
        $this->ensureDirectoryExists($directory);
        $this->directory = $directory;
        $this->eventProcessingService = $eventProcessingService;
        $this->logger = $logger;
    }

    /**
     * @param string $directory
     */
    protected function ensureDirectoryExists(string $directory)
    {
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
    }

    /**
     * @param string $serializedEvent
     * @return bool
     */
    public function pushEvent(string $serializedEvent): bool
    {
        file_put_contents($this->directory . '/' . time() . '_' . md5($serializedEvent) . '.txt', $serializedEvent);
        return true;
    }

    /**
     * @param int $maxItems
     */
    public function processQueue($maxItems = 100)
    {
        $count = 0;

        $directoryIterator = new \CallbackFilterIterator(
            new DirectoryIterator($this->directory),
            function(\SplFileInfo $fileInfo) {
                return (preg_match("/\.txt$/", $fileInfo->getFilename()));
            }
        );

        foreach ($directoryIterator as $file) {

            if ($count === $maxItems) {
                return;
            }
            $serializedEvent = file_get_contents($file->getPathname());

            try {
                $this->eventProcessingService->processEvent($serializedEvent);
            } catch (\Exception $ex) {
                $this->logger->critical($ex->getMessage());
            }

            //@todo maybe archive
            unlink($file->getPathname());
            $count++;
        }
    }
}