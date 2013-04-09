<fieldset id="opcg" class="ontology">
<legend>{{ i18n::t('opcg') }}</legend>

<p class="help">
	For more information about the Ontario Pesticide Classification Guideline, refer to <a href="http://www.ene.gov.on.ca/environment/en/category/pesticides/STDPROD_079355.html#1">The Pesticide Classification Guideline</a>.
</p>

{{ Form::label('opcg_class', i18n::t('opcg_class')); }}
{{ Form::select('opcg_class', array(
		'' => '',
		'opcg_class1' => i18n::t('opcg_class1', 'en_long'),
		'opcg_class2' => i18n::t('opcg_class2', 'en_long'),
		'opcg_class3' => i18n::t('opcg_class3', 'en_long'),
		'opcg_class4' => i18n::t('opcg_class4', 'en_long'),
		'opcg_class5' => i18n::t('opcg_class5', 'en_long'),
		'opcg_class6' => i18n::t('opcg_class6', 'en_long'),
		'opcg_class7' => i18n::t('opcg_class7', 'en_long'),
		'opcg_class8' => i18n::t('opcg_class8', 'en_long'),
		'opcg_class9' => i18n::t('opcg_class9', 'en_long'),
		'opcg_class10' => i18n::t('opcg_class10', 'en_long'),
		'opcg_class11' => i18n::t('opcg_class11', 'en_long'),
	), $input['opcg_class'], array('multiple' => 'true', 'id' => 'opcg_class')); }}
</fieldset>