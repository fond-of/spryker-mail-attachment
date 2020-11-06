<?php

declare(strict_types = 1);

namespace FondOfSpryker\Zed\MailAttachment\Business;

use Generated\Shared\Transfer\MailTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * Class MailAttachmentFacade
 *
 * @package FondOfSpryker\Zed\MailAttachment\Business
 *
 * @method \FondOfSpryker\Zed\MailAttachment\Business\MailAttachmentBusinessFactory getFactory()
 */
class MailAttachmentFacade extends AbstractFacade implements MailAttachmentFacadeInterface
{
    /**
     * Specification:
     *  - Expands order mail transfer data with MailAttachment groups data.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\MailTransfer $mailTransfer
     * @param \Generated\Shared\Transfer\OrderTransfer $orderTransfer
     *
     * @return \Generated\Shared\Transfer\MailTransfer
     */
    public function expandOrderMailTransfer(MailTransfer $mailTransfer, OrderTransfer $orderTransfer): MailTransfer
    {
        return $this->getFactory()->createMailAttachmentExpander()->expand($mailTransfer, $orderTransfer);
    }
}
