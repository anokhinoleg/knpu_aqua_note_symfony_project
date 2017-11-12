<?php
/**
 * Created by PhpStorm.
 * User: olegyurievich
 * Date: 14.10.17
 * Time: 16:17
 */

namespace AppBundle\EventSubscriber;

use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class AddNiceHeaderEventSubscriber implements EventSubscriberInterface
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function onKernelResponse(FilterResponseEvent $event)
    {
        $this->logger->info('adding a nice logger');
        $event->getResponse()
            ->headers->set("X-NICE-MESSAGE", "This was a great request");
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::RESPONSE => 'onKernelResponse'
        ];
    }
}