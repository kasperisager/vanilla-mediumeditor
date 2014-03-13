<?php if (!defined('APPLICATION')) exit;

$PluginInfo['mediumeditor'] = array(
    'Name'        => "MediumEditor",
    'Version'     => '1.0.0',
    'Description' => "HTML5 Content Editable makes its way to Vanilla through the MediumEditor Javascript plugin by Davi Ferreira. It offers an entirely new editing experience that is sure to please both you and your users alike.",
    'Author'      => "Kasper Kronborg Isager",
    'AuthorEmail' => 'kasperisager@gmail.com',
    'AuthorUrl'   => 'https://github.com/kasperisager',
    'License'     => 'MIT',
    'RequiredApplications' => array('Vanilla' => '2.1.x')
);

/**
 * MediumEditor Plugin
 *
 * @author    Kasper Kronborg Isager <kasperisager@gmail.com>
 * @copyright 2014 (c) Kasper Kronborg Isager
 * @license   MIT
 * @package   MediumEditor
 * @since     1.0.0
 */
class MediumEditorPlugin extends Gdn_Plugin
{
    /**
     * Initialize MediumEditor
     *
     * @param Gdn_Form $sender
     */
    public function Gdn_Form_beforeBodyBox_handler($sender)
    {
        // Make sure that WYSIWYG is used
        $sender->setValue('Format', 'Wysiwyg');

        // Remove jQuery Autogrow as it interfeers with the editor
        Gdn::controller()->removeJsFile('jquery.autogrow.js');

        // Add the assets we need for the editor
        Gdn::controller()->addJsFile('editor.min.js', 'plugins/mediumeditor');
        Gdn::controller()->addCssFile('editor.min.css', 'plugins/mediumeditor');
    }
}
