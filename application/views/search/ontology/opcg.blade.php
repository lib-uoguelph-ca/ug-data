<fieldset id="opcg" class="ontology">
<legend>{{ i18n::t('opcg') }}</legend>

<p class="help">
	For more information about the Ontario Pesticide Classification Guideline, refer to <a href="http://www.ene.gov.on.ca/environment/en/category/pesticides/STDPROD_079355.html#1">The Pesticide Classification Guideline</a>.
</p>

{{ Form::label('opcg_class', i18n::t('opcg_class')); }}
{{ Form::select('opcg_class', array(
		'' => '',
		'opcg_class1' => 'Class 1 - Products intended for manufacturing purposes',
		'opcg_class2' => 'Class 2 - Restricted or commercial products',
		'opcg_class3' => 'Class 3 - Restricted or commercial products',
		'opcg_class4' => 'Class 4 - Restricted or commercial products',
		'opcg_class5' => 'Class 5 - Domestic products intended for household use',
		'opcg_class6' => 'Class 6 - Domestic products intended for household use',
		'opcg_class7' => 'Class 7 - Controlled sale products (domestic or restricted)',
		'opcg_class8' => 'Class 8 - Domestic products that are banned for sale and use',
		'opcg_class9' => 'Class 9 - Pesticides are ingredients in products for use only under exceptions to the ban',
		'opcg_class10' => 'Class 10 - Pesticides are ingredients in products for the poisonous plant exception',
		'opcg_class11' => 'Class 11 - Pesticides are ingredients in products for cosmetic uses under the ban',
	), $input['opcg_class'], array('multiple' => 'true', 'id' => 'opcg_class')); }}
</fieldset>