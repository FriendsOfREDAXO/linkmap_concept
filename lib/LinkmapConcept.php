<?php

class LinkmapConcept
{
	// linkmap catlist
	public static function getOutput($ep)
	{
		$categories = rex_category::getRootCategories();

		$sOut = '';
		foreach($categories as $category){
			$sOut .= '
				<div class="widget-category" data-tag="'.$category->getName().'" data-id="'.$category->getId().'" data-name="'.$category->getName().'">
					<div class="widget-category-title">'.$category->getName().'</div>
					<div class="widget-button-select">Übernehmen</div>
				</div>
			';
		}
		
		$out = '
			<div class="button button-widget-show">
				<button class="btn btn-apply" type="submit">Linkmap anzeigen</button>
			</div>
			
			<div class="rex-widget">
				<div class="widget-container">
					<div class="widget-main">
						<div class="widget-close">X</div>
						<div class="widget-title">Linkmap</div>
						<div class="widget-menu">
							<button class="btn btn-apply button-link-add" type="submit">hinzufügen</button>
							<input class="form-control" type="text" id="filter-tag" name="filterTag" placeholder="Filter, Suche">
						</div>
						<div class="widget-content">
							<div class="widget-linkmap">
								<div class="widget-button-back">Zurück</div>
								'.$sOut.'
							</div>
						</div>
					</div>
					<div class="widget-aside">
						<div class="widget-meta">
							<div class="widget-meta-field widget-meta-title is-editable" contenteditable="true">Lorem ipsum</div>
							<div class="widget-meta-field widget-meta-description is-editable" contenteditable="true">Lorem ipsum dolor sit amet</div>
							<div class="widget-meta-field widget-meta-tag"><input class="form-control" type="text" id="meta-tag" name="meta-tag" placeholder="Tag, Kategorie"></div>
							<div class="widget-meta-field widget-meta-rights"><input class="form-control" type="text" id="meta-tag" name="meta-rights" placeholder="Rechte, Benutzer"></div>
							<div class="widget-meta-field"><button class="btn btn-apply button-link-select" type="submit">In Artikel übernehmen</button></div>
							<div class="widget-meta-field"><button class="btn btn-delete button-link-delete" type="submit">Unwideruflich löschen</button></div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="rex-dialog">
				<div class="dialog-container">
					<div class="dialog-close">X</div>
					<div class="dialog-title">
						Medium hinzufügen
					</div>
					<div class="dialog-content">
						<div class="upload-container">
							Zum Hochladen Dateien per Drag & Drop hier ablegen.<br>
							<br>
							oder<br>
							<br>
							<button class="btn btn-setup button-upload-select" type="submit">Dateien auswählen</button><br>
							<br>
							<small>Maximale Dateigröße für Uploads: 2 MB.</small>
							<input id="fileInput" type="file" style="display:none;" />
						</div>
					</div>
				</div>
			</div>
		';
		
		return $out . $ep->getSubject();
	}
}
