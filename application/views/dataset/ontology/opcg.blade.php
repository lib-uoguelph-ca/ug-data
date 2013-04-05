<fieldset id="opcg" class="ontology">
<legend>{{ i18n::t('opcg') }}</legend>

<p class="help">
	For more information about the Ontario Pesticide Classification Guideline, refer to <a href="http://www.ene.gov.on.ca/environment/en/category/pesticides/STDPROD_079355.html#1">The Pesticide Classification Guideline</a>.
</p>

{{ Form::label('opcg_class', i18n::t('opcg_class')); }}
{{ Form::select('opcg_class[]', array(
		'class_1' => 'Class 1 - Products intended for manufacturing purposes',
		'class_2' => 'Class 2 - Restricted or commercial products',
		'class_3' => 'Class 3 - Restricted or commercial products',
		'class_4' => 'Class 4 - Restricted or commercial products',
		'class_5' => 'Class 5 - Domestic products intended for household use',
		'class_6' => 'Class 6 - Domestic products intended for household use',
		'class_7' => 'Class 7 - Controlled sale products (domestic or restricted)',
		'class_8' => 'Class 8 - Domestic products that are banned for sale and use',
		'class_9' => 'Class 9 - Pesticides are ingredients in products for use only under exceptions to the ban',
		'class_10' => 'Class 10 - Pesticides are ingredients in products for the poisonous plant exception',
		'class_11' => 'Class 11 - Pesticides are ingredients in products for cosmetic uses under the ban',
	), $input['opcg_class'], array('multiple' => 'true', 'id' => 'opcg_class')); }}
</fieldset>
