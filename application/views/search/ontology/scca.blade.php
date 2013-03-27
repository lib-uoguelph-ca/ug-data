<fieldset id="scca" class="ontology">
<legend>{{ i18n::t('scca') }}</legend>

<p class="help">
	For more information about Soil Capability Classifiation for Agriculture, refer to <a href="http://www.omafra.gov.on.ca/english/landuse/classify.htm">Classifying Prime and Marginal Agricultural Soils and Landscapes: Guidelines for Application of the Canada Land Inventory in Ontario</a>.
</p>

{{ Form::label('scca_class', i18n::t('Capability Class')); }}
{{ Form::select('scca_class', array('' => '', 'class_1' => 'Class 1 - Soils in this class_have no significant limitations in use for crops.', 'class_2' => 'Class 2 - Soils in this class_have moderate limitations that reduce the choice of crops, or require moderate conservation practices.', 'class_3' => 'Class 3 - Soils in this class_have moderately severe limitations that reduce the choice of crops or require special conservation practices.', 'class_4' => 'Class 4 - Soils in this class_have severe limitations that restrict the choice of crops, or require special conservation practices and very careful management, or both.', 'class_5' => 'Class 5 - Soils in this class_have very severe limitations that restrict their capability to producing perennial forage crops, and improvement practices are feasible.', 'class_6' => 'Class 6 - Soils in this class_are unsuited for cultivation, but are capable of use for unimproved permanent pasture.', 'class_7' => 'Class 7 - Soils in this class_have no capability for arable culture or permanent pasture.'), $input['scca_class'], array('id' => 'scca_class')); }}

{{ Form::label('scca_subclass', i18n::t('Capability Subclass')); }}
{{ Form::select('scca_subclass', array('' => '', 'subclass_c' => 'Subclass C - Adverse climate', 'subclass_d' => 'Subclass D - Undesirable soil structure and/or low permeability', 'subclass_e' => 'Subclass E - Erosion', 'subclass_f' => 'Subclass F - Low natural fertility', 'subclass_i' => 'Subclass I - Inundation by streams or lakes', 'subclass_m' => 'Subclass M – Moisture deficiency', 'subclass_p' => 'Subclass P - Stoniness', 'subclass_r' => 'Subclass R - Consolidated bedrock', 'subclass_s' => 'Subclass S - Adverse soil characteristics', 'subclass_t' => 'Subclass T - Topography', 'subclass_w' => 'Subclass W - Excess water'), $input['scca_subclass'], array('id' => 'scca_subclass')); }}

</fieldset>
