<?php

declare(strict_types = 1);

namespace FondOfSpryker\Zed\MailAttachment;

use FondOfSpryker\Shared\MailAttachment\MailAttachmentConstants;
use Spryker\Zed\Kernel\AbstractBundleConfig;

class MailAttachmentConfig extends AbstractBundleConfig
{
    /**
     * @return array
     */
    public function getOrderAttachments(): array
    {
        return $this->get(MailAttachmentConstants::MAIL_ATTACHMENTS_ORDER, []);
    }
}
