<fieldset id="scca" class="ontology">
<legend>{{ i18n::t('scca') }}</legend>

<p class="help">
	For more information about Soil Capability Classifiation for Agriculture, refer to <a href="http://www.omafra.gov.on.ca/english/landuse/classify.htm">Classifying Prime and Marginal Agricultural Soils and Landscapes: Guidelines for Application of the Canada Land Inventory in Ontario</a>.
</p>

{{ Form::label('scca_class', i18n::t('Capability Class')); }}
{{ Form::select('scca_class', array(
		'' => '', 
		'scca_class_1' => 'Class 1 - Soils in this class have no significant limitations in use for crops.', 
		'scca_class_2' => 'Class 2 - Soils in this class have moderate limitations that reduce the choice of crops, or require moderate conservation practices.', 
		'scca_class_3' => 'Class 3 - Soils in this class have moderately severe limitations that reduce the choice of crops or require special conservation practices.', 
		'scca_class_4' => 'Class 4 - Soils in this class have severe limitations that restrict the choice of crops, or require special conservation practices and very careful management, or both.', 
		'scca_class_5' => 'Class 5 - Soils in this class have very severe limitations that restrict their capability to producing perennial forage crops, and improvement practices are feasible.', 
		'scca_class_6' => 'Class 6 - Soils in this class are unsuited for cultivation, but are capable of use for unimproved permanent pasture.', 
		'scca_class_7' => 'Class 7 - Soils in this class have no capability for arable culture or permanent pasture.'
	), $input['scca_class'], array('id' => 'scca_class')); }}

{{ Form::label('scca_subclass', i18n::t('Capability Subclass')); }}
{{ Form::select('scca_subclass', array(
		'' => '', 
		'scca_subclass_c' => 'Subclass C - Adverse climate', 
		'scca_subclass_d' => 'Subclass D - Undesirable soil structure and/or low permeability', 
		'scca_subclass_e' => 'Subclass E - Erosion', 'subclass_f' => 'Subclass F - Low natural fertility', 
		'scca_subclass_i' => 'Subclass I - Inundation by streams or lakes', 
		'scca_subclass_m' => 'Subclass M – Moisture deficiency', 
		'scca_subclass_p' => 'Subclass P - Stoniness', 
		'scca_subclass_r' => 'Subclass R - Consolidated bedrock', 
		'scca_subclass_s' => 'Subclass S - Adverse soil characteristics', 
		'scca_subclass_t' => 'Subclass T - Topography', 
		'scca_subclass_w' => 'Subclass W - Excess water'
	), $input['scca_subclass'], array('id' => 'scca_subclass')); }}

</fieldset>
