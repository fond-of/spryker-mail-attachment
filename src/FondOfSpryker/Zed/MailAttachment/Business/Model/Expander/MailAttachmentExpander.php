<?php

declare(strict_types = 1);

namespace FondOfSpryker\Zed\MailAttachment\Business\Model\Expander;

use FondOfSpryker\Zed\MailAttachment\MailAttachmentConfig;
use Generated\Shared\Transfer\MailAttachmentTransfer;
use Generated\Shared\Transfer\MailTransfer;
use Generated\Shared\Transfer\OrderTransfer;

class MailAttachmentExpander implements ExpanderInterface
{
    /**
     * @var \FondOfSpryker\Zed\MailAttachment\MailAttachmentConfig
     */
    protected $config;

    /**
     * @param \FondOfSpryker\Zed\MailAttachment\MailAttachmentConfig $config
     */
    public function __construct(MailAttachmentConfig $config)
    {
        $this->config = $config;
    }

    /**
     * @param \Generated\Shared\Transfer\MailTransfer $mailTransfer
     * @param \Generated\Shared\Transfer\OrderTransfer $orderTransfer
     *
     * @return \Generated\Shared\Transfer\MailTransfer
     */
    public function expand(MailTransfer $mailTransfer, OrderTransfer $orderTransfer): MailTransfer
    {
        foreach ($this->config->getOrderAttachments() as $name => $path) {
            $attachment = new MailAttachmentTransfer();
            $attachment->setAttachmentUrl($this->buildAbsolutePath($path));
            $attachment->setFileName($this->getFileNameFromString($path));
            $attachment->setDisplayName($name);
            $mailTransfer->addAttachment($attachment);
        }

        return $mailTransfer;
    }

    /**
     * @param string $path
     *
     * @return string
     */
    protected function getFileNameFromString(string $path): string
    {
        $data = explode('/', $path);

        return array_pop($data);
    }

    /**
     * @param string $path
     *
     * @return string
     */
    protected function buildAbsolutePath(string $path): string
    {
        if (substr($path, 0, strlen('/')) === '/') {
            return $path;
        }

        return sprintf('%s%s%s', __DIR__, '/../../../../../../../../../../', $path);
    }
}
