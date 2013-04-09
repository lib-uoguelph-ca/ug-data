<fieldset id="scca" class="ontology">
<legend>{{ i18n::t('scca') }}</legend>

<p class="help">
	For more information about Soil Capability Classifiation for Agriculture, refer to <a href="http://www.omafra.gov.on.ca/english/landuse/classify.htm">Classifying Prime and Marginal Agricultural Soils and Landscapes: Guidelines for Application of the Canada Land Inventory in Ontario</a>.
</p>

{{ Form::label('scca_class', i18n::t('Capability Class')); }}
{{ Form::select('scca_class', array(
		'' => '', 
		'scca_class_1' => i18n::t('scca_class_1', 'en_long'), 
		'scca_class_2' => i18n::t('scca_class_2', 'en_long'), 
		'scca_class_3' => i18n::t('scca_class_3', 'en_long'), 
		'scca_class_4' => i18n::t('scca_class_4', 'en_long'), 
		'scca_class_5' => i18n::t('scca_class_5', 'en_long'), 
		'scca_class_6' => i18n::t('scca_class_6', 'en_long'), 
		'scca_class_7' => i18n::t('scca_class_7', 'en_long')
	), $input['scca_class'], array('id' => 'scca_class')); }}

{{ Form::label('scca_subclass', i18n::t('Capability Subclass')); }}
{{ Form::select('scca_subclass', array(
		'' => '', 
		'scca_subclass_c' => i18n::t('scca_subclass_c', 'en_long'), 
		'scca_subclass_d' => i18n::t('scca_subclass_d', 'en_long'), 
		'scca_subclass_e' => i18n::t('scca_subclass_e', 'en_long'), 
		'scca_subclass_i' => i18n::t('scca_subclass_i', 'en_long'), 
		'scca_subclass_m' => i18n::t('scca_subclass_m', 'en_long'), 
		'scca_subclass_p' => i18n::t('scca_subclass_p', 'en_long'), 
		'scca_subclass_r' => i18n::t('scca_subclass_r', 'en_long'), 
		'scca_subclass_s' => i18n::t('scca_subclass_s', 'en_long'), 
		'scca_subclass_t' => i18n::t('scca_subclass_t', 'en_long'), 
		'scca_subclass_w' => i18n::t('scca_subclass_w', 'en_long')
	), $input['scca_subclass'], array('id' => 'scca_subclass')); }}

</fieldset>
