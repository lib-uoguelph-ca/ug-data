<fieldset id="opcg" class="ontology">
<legend>{{ i18n::t('opcg') }}</legend>

<p class="help">
	For more information about the Ontario Pesticide Classification Guideline, refer to <a href="http://www.ene.gov.on.ca/environment/en/category/pesticides/STDPROD_079355.html#1">The Pesticide Classification Guideline</a>.
</p>

{{ Form::label('opcg_class', i18n::t('opcg_class')); }}
{{ Form::select('opcg_class[]', array(
		'opcg_class_1' => i18n::t('opcg_class_1', 'en_long'),
		'opcg_class_2' => i18n::t('opcg_class_2', 'en_long'),
		'opcg_class_3' => i18n::t('opcg_class_3', 'en_long'),
		'opcg_class_4' => i18n::t('opcg_class_4', 'en_long'),
		'opcg_class_5' => i18n::t('opcg_class_5', 'en_long'),
		'opcg_class_6' => i18n::t('opcg_class_6', 'en_long'),
		'opcg_class_7' => i18n::t('opcg_class_7', 'en_long'),
		'opcg_class_8' => i18n::t('opcg_class_8', 'en_long'),
		'opcg_class_9' => i18n::t('opcg_class_9', 'en_long'),
		'opcg_class_10' => i18n::t('opcg_class_10', 'en_long'),
		'opcg_class_11' => i18n::t('opcg_class_11', 'en_long'),
	), $input['opcg_class'], array('multiple' => 'true', 'id' => 'opcg_class')); }}
</fieldset>
