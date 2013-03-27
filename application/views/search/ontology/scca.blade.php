<fieldset id="scca" class="ontology">
<legend>Soil Capability Classification for Agriculture</legend>

<p class="help">
	For more information about Soil Capability Classifiation for Agriculture, refer to <a href="http://www.omafra.gov.on.ca/english/landuse/classify.htm">Classifying Prime and Marginal Agricultural Soils and Landscapes: Guidelines for Application of the Canada Land Inventory in Ontario</a>.
</p>

{{ Form::label('scca_class', 'Capability Class'); }}
{{ Form::select('scca_class', array('' => '', 'class-1' => 'Class 1 - Soils in this class-have no significant limitations in use for crops.', 'class-2' => 'Class 2 - Soils in this class-have moderate limitations that reduce the choice of crops, or require moderate conservation practices.', 'class-3' => 'Class 3 - Soils in this class-have moderately severe limitations that reduce the choice of crops or require special conservation practices.', 'class-4' => 'Class 4 - Soils in this class-have severe limitations that restrict the choice of crops, or require special conservation practices and very careful management, or both.', 'class-5' => 'Class 5 - Soils in this class-have very severe limitations that restrict their capability to producing perennial forage crops, and improvement practices are feasible.', 'class-6' => 'Class 6 - Soils in this class-are unsuited for cultivation, but are capable of use for unimproved permanent pasture.', 'class-7' => 'Class 7 - Soils in this class-have no capability for arable culture or permanent pasture.'), $input['scca_class'], array('id' => 'scca_class')); }}

{{ Form::label('scca_subclass', 'Capability Subclass'); }}
{{ Form::select('scca_subclass', array('' => '', 'subclass-c' => 'Subclass C - Adverse climate', 'subclass-d' => 'Subclass D - Undesirable soil structure and/or low permeability', 'subclass-e' => 'Subclass E - Erosion', 'subclass-f' => 'Subclass F - Low natural fertility', 'subclass-i' => 'Subclass I - Inundation by streams or lakes', 'subclass-m' => 'Subclass M – Moisture deficiency', 'subclass-p' => 'Subclass P - Stoniness', 'subclass-r' => 'Subclass R - Consolidated bedrock', 'subclass-s' => 'Subclass S - Adverse soil characteristics', 'subclass-t' => 'Subclass T - Topography', 'subclass-w' => 'Subclass W - Excess water'), $input['scca_subclass'], array('id' => 'scca_subclass')); }}

</fieldset>
