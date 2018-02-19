/**
 * @package    DD_Article_Slides
 *
 * @author     HR IT-Solutions Florian Häusler <info@hr-it-solutions.com>
 * @copyright  Copyright (C) 2011 - 2018 Didldu e.K. | HR IT-Solutions
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/

window.insertDDArticleSlides = function(editor) {
	"use strict";
	if (!Joomla.getOptions('xtd-article_slides')) {
		// Something went wrong!
		return false;
	}

	var content, options = window.Joomla.getOptions('xtd-article_slides');

	if (window.Joomla && window.Joomla.editors && window.Joomla.editors.instances && window.Joomla.editors.instances.hasOwnProperty(editor)) {
		content = window.Joomla.editors.instances[editor].getValue();
	} else {
		content = (new Function('return ' + options.editor))();
	}

	if (content.match(/dd_article_slides/i)) {
		alert(options.exists);
		return false;
	} else {
        /** Use the API, if editor supports it **/
        if (window.Joomla && window.Joomla.editors && window.Joomla.editors.instances && window.Joomla.editors.instances.hasOwnProperty(editor)) {
            window.Joomla.editors.instances[editor].replaceSelection('{dd_article_slides}{/dd}');
        } else {
            window.jInsertEditorText('{dd_article_slides}{/dd}', editor);
        }
	}
};
