<?php

if (rex::isBackend()) {
    rex_extension::register('PAGE_TITLE_SHOWN', 'LinkmapConcept::getOutput');
    rex_view::addCssFile($this->getAssetsUrl('css/linkmap_concept.css'));
	rex_view::addJsFile($this->getAssetsUrl('js/linkmap_concept.js'));
}