<?php
/**
 * @package    DD_Article_Slides
 *
 * @author     HR IT-Solutions Florian Häusler <info@hr-it-solutions.com>
 * @copyright  Copyright (C) 2017 - 2017 Didldu e.K. | HR IT-Solutions
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/

defined('_JEXEC') or die;

/**
 * Editor Readmore button
 *
 * @since  1.0.0.0
 */
class PlgButtonDD_Article_Slides extends JPlugin
{
	/**
	 * Load the language file on instantiation.
	 *
	 * @var    boolean
	 * @since  3.1
	 */
	protected $autoloadLanguage = true;

	/**
	 * Readmore button
	 *
	 * @param   string  $name  The name of the button to add
	 *
	 * @return  JObject  The button options as JObject
	 *
	 * @since   1.5
	 */
	public function onDisplay($name)
	{
		JHtml::_('script', 'plg_editors-xtd_dd_article_slides/article_slides.js', array('version' => 'auto', 'relative' => true));

		// Pass some data to javascript
		JFactory::getDocument()->addScriptOptions(
			'xtd-article_slides',
			array(
				'editor' => $this->_subject->getContent($name),
				'exists' => JText::_('PLG_EDITORS-XTD_DD_ARTICLE_SLIDES_ALREADY_EXISTS', true),
			)
		);

		$button = new JObject;
		$button->modal   = false;
		$button->class   = 'btn';
		$button->onclick = 'insertDDArticleSlides(\'' . $name . '\');return false;';
		$button->text    = JText::_('PLG_EDITORS-XTD_DD_ARTICLE_SLIDES');
		$button->name    = 'image';
		$button->link    = '#';

		return $button;
	}
}
