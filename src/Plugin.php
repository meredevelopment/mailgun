<?php
/**
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 */
namespace craftcms\mailgun;

use Craft;
use craft\events\Event;
use craft\events\RegisterComponentTypesEvent;
use craft\helpers\MailerHelper;

/**
 * Plugin represents the Mailgun plugin.
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since  3.0
 */
class Plugin extends \craft\base\Plugin
{
	// Public Methods
	// =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        Event::on(MailerHelper::class, MailerHelper::EVENT_REGISTER_MAILER_TRANSPORT_TYPES, function(RegisterComponentTypesEvent $event) {
            $event->types[] = MailgunAdapter::class;
        });
    }

    /**
     * Returns the mailer transport adapters provided by this plugin.
     *
     * @return string[]
     */
    public function getMailTransportAdapters()
    {
        return [
            MailgunAdapter::className(),
        ];
    }
}