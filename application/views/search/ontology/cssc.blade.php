<fieldset id="cssc" class="ontology">
<legend>{{ i18n::t('cssc') }}</legend>

<p class="help">
	For more information about the Canadian System of Soil Classification, refer to <a href="http://res.agr.ca/cansis/taxa/cssc3/intro.html">The Canadian System of Soil Classification, 3rd edition</a>.
</p>

{{ Form::label('cssc_order', i18n::t('cssc_order')); }}
{{ Form::select('cssc_order', array(
		'' => '',
		'cssc_order_a' => i18n::t('cssc_order_a', 'en_long'), 
		'cssc_order_b' => i18n::t('cssc_order_b', 'en_long'), 
		'cssc_order_c' => i18n::t('cssc_order_c', 'en_long'), 
		'cssc_order_d' => i18n::t('cssc_order_d', 'en_long'), 
		'cssc_order_e' => i18n::t('cssc_order_e', 'en_long'), 
		'cssc_order_f' => i18n::t('cssc_order_f', 'en_long'), 
		'cssc_order_g' => i18n::t('cssc_order_g', 'en_long'), 
		'cssc_order_h' => i18n::t('cssc_order_h', 'en_long'), 
		'cssc_order_i' => i18n::t('cssc_order_i', 'en_long'), 
		'cssc_order_j' => i18n::t('cssc_order_j', 'en_long'), 
	), $input['cssc_order'], array('id' => 'cssc_order')); }}

{{ Form::label('cssc_great', i18n::t('cssc_great')); }}
{{ Form::select('cssc_great', array(
		'' => '',
		'cssc_group_a' => i18n::t('cssc_group_a', 'en_long'), 
		'cssc_group_b' => i18n::t('cssc_group_b', 'en_long'), 
		'cssc_group_c' => i18n::t('cssc_group_c', 'en_long'), 
		'cssc_group_d' => i18n::t('cssc_group_d', 'en_long'), 
		'cssc_group_a' => i18n::t('cssc_group_a', 'en_long'), 
		'cssc_group_f' => i18n::t('cssc_group_f', 'en_long'), 
		'cssc_group_g' => i18n::t('cssc_group_g', 'en_long'), 
		'cssc_group_h' => i18n::t('cssc_group_h', 'en_long'), 
		'cssc_group_i' => i18n::t('cssc_group_i', 'en_long'),
	), $input['cssc_great'], array('id' => 'cssc_great')); }}

{{ Form::label('cssc_sub', i18n::t('cssc_sub')); }}
{{ Form::select('cssc_sub', array(
		'' => '',
		'cssc_subgroup_aaa' => i18n::t('cssc_subgroup_aaa', 'en_long'), 
		'cssc_subgroup_aab' => i18n::t('cssc_subgroup_aab', 'en_long'),
		'cssc_subgroup_aac' => i18n::t('cssc_subgroup_aac', 'en_long'), 
		'cssc_subgroup_aad' => i18n::t('cssc_subgroup_aad', 'en_long'),
		'cssc_subgroup_aae' => i18n::t('cssc_subgroup_aae', 'en_long'), 
		'cssc_subgroup_aaf' => i18n::t('cssc_subgroup_aaf', 'en_long'),
		'cssc_subgroup_aag' => i18n::t('cssc_subgroup_aag', 'en_long'), 
		
		'cssc_subgroup_aba' => i18n::t('cssc_subgroup_aba', 'en_long'),
		'cssc_subgroup_abb' => i18n::t('cssc_subgroup_abb', 'en_long'), 
		'cssc_subgroup_abc' => i18n::t('cssc_subgroup_abc', 'en_long'),
		'cssc_subgroup_abd' => i18n::t('cssc_subgroup_abd', 'en_long'), 
		'cssc_subgroup_abe' => i18n::t('cssc_subgroup_abe', 'en_long'),
		'cssc_subgroup_abf' => i18n::t('cssc_subgroup_abf', 'en_long'), 
		'cssc_subgroup_abg' => i18n::t('cssc_subgroup_abg', 'en_long'),
		'cssc_subgroup_abh' => i18n::t('cssc_subgroup_abh', 'en_long'), 
		'cssc_subgroup_abi' => i18n::t('cssc_subgroup_abi', 'en_long'),
		
		'cssc_subgroup_aca' => i18n::t('cssc_subgroup_aca', 'en_long'), 
		'cssc_subgroup_acb' => i18n::t('cssc_subgroup_acb', 'en_long'),
		'cssc_subgroup_acc' => i18n::t('cssc_subgroup_acc', 'en_long'),
		'cssc_subgroup_acd' => i18n::t('cssc_subgroup_acd', 'en_long'), 
		'cssc_subgroup_ace' => i18n::t('cssc_subgroup_ace', 'en_long'),
		'cssc_subgroup_acf' => i18n::t('cssc_subgroup_acf', 'en_long'), 
		'cssc_subgroup_acg' => i18n::t('cssc_subgroup_acg', 'en_long'),
		'cssc_subgroup_ach' => i18n::t('cssc_subgroup_ach', 'en_long'), 
		'cssc_subgroup_aci' => i18n::t('cssc_subgroup_aci', 'en_long'),
		'cssc_subgroup_acj' => i18n::t('cssc_subgroup_acj', 'en_long'), 

		'cssc_subgroup_baa' => i18n::t('cssc_subgroup_baa', 'en_long'), 
		'cssc_subgroup_bab' => i18n::t('cssc_subgroup_bab', 'en_long'), 
		'cssc_subgroup_bac' => i18n::t('cssc_subgroup_bac', 'en_long'), 
		'cssc_subgroup_bad' => i18n::t('cssc_subgroup_bad', 'en_long'),

		'cssc_subgroup_bba' => i18n::t('cssc_subgroup_bba', 'en_long'), 
		'cssc_subgroup_bbb' => i18n::t('cssc_subgroup_bbb', 'en_long'), 
		'cssc_subgroup_bbc' => i18n::t('cssc_subgroup_bbc', 'en_long'), 
		'cssc_subgroup_bbd' => i18n::t('cssc_subgroup_bbd', 'en_long'), 
		'cssc_subgroup_bbe' => i18n::t('cssc_subgroup_bbe', 'en_long'), 
		'cssc_subgroup_bbf' => i18n::t('cssc_subgroup_bbf', 'en_long'), 
		'cssc_subgroup_bbg' => i18n::t('cssc_subgroup_bbg', 'en_long'), 
		'cssc_subgroup_bbh' => i18n::t('cssc_subgroup_bbh', 'en_long'), 
		'cssc_subgroup_bbi' => i18n::t('cssc_subgroup_bbi', 'en_long'), 

		'cssc_subgroup_bca' => i18n::t('cssc_subgroup_bca', 'en_long'),
		'cssc_subgroup_bcb' => i18n::t('cssc_subgroup_bcb', 'en_long'),
		'cssc_subgroup_bcc' => i18n::t('cssc_subgroup_bcc', 'en_long'),
		'cssc_subgroup_bcd' => i18n::t('cssc_subgroup_bcd', 'en_long'),
		'cssc_subgroup_bce' => i18n::t('cssc_subgroup_bce', 'en_long'),
		'cssc_subgroup_bcf' => i18n::t('cssc_subgroup_bcf', 'en_long'),
		'cssc_subgroup_bcg' => i18n::t('cssc_subgroup_bcg', 'en_long'),
		'cssc_subgroup_bch' => i18n::t('cssc_subgroup_bch', 'en_long'),
		'cssc_subgroup_bci' => i18n::t('cssc_subgroup_bci', 'en_long'),

		'cssc_subgroup_bda' => i18n::t('cssc_subgroup_bda', 'en_long'), 
		'cssc_subgroup_bdb' => i18n::t('cssc_subgroup_bdb', 'en_long'), 
		'cssc_subgroup_bdc' => i18n::t('cssc_subgroup_bdc', 'en_long'), 
		'cssc_subgroup_bdd' => i18n::t('cssc_subgroup_bdd', 'en_long'), 
		'cssc_subgroup_bde' => i18n::t('cssc_subgroup_bde', 'en_long'), 
		'cssc_subgroup_bdf' => i18n::t('cssc_subgroup_bdf', 'en_long'), 
		'cssc_subgroup_bdg' => i18n::t('cssc_subgroup_bdg', 'en_long'), 
		'cssc_subgroup_bgh' => i18n::t('cssc_subgroup_bgh', 'en_long'), 
		'cssc_subgroup_bgi' => i18n::t('cssc_subgroup_bgi', 'en_long'), 

		'cssc_subgroup_caa' => i18n::t('cssc_subgroup_caa', 'en_long'), 
		'cssc_subgroup_cab' => i18n::t('cssc_subgroup_cab', 'en_long'), 
		'cssc_subgroup_cac' => i18n::t('cssc_subgroup_cac', 'en_long'), 

		'cssc_subgroup_cba' => i18n::t('cssc_subgroup_cba', 'en_long'), 
		'cssc_subgroup_cbb' => i18n::t('cssc_subgroup_cbb', 'en_long'), 
		'cssc_subgroup_cbc' => i18n::t('cssc_subgroup_cbc', 'en_long'), 

		'cssc_subgroup_daa' => i18n::t('cssc_subgroup_daa', 'en_long'), 
		'cssc_subgroup_dab' => i18n::t('cssc_subgroup_dab', 'en_long'), 
		'cssc_subgroup_dac' => i18n::t('cssc_subgroup_dac', 'en_long'), 
		'cssc_subgroup_dad' => i18n::t('cssc_subgroup_dad', 'en_long'), 
		'cssc_subgroup_dae' => i18n::t('cssc_subgroup_dae', 'en_long'), 

		'cssc_subgroup_dba' => i18n::t('cssc_subgroup_dba', 'en_long'),
		'cssc_subgroup_dbb' => i18n::t('cssc_subgroup_dbb', 'en_long'),
		'cssc_subgroup_dbc' => i18n::t('cssc_subgroup_dbc', 'en_long'),
		'cssc_subgroup_dbd' => i18n::t('cssc_subgroup_dbd', 'en_long'),
		'cssc_subgroup_dbe' => i18n::t('cssc_subgroup_dbe', 'en_long'),
		'cssc_subgroup_dbf' => i18n::t('cssc_subgroup_dbf', 'en_long'),
		'cssc_subgroup_dbg' => i18n::t('cssc_subgroup_dbg', 'en_long'),
		'cssc_subgroup_dbh' => i18n::t('cssc_subgroup_dbh', 'en_long'),
		'cssc_subgroup_dbi' => i18n::t('cssc_subgroup_dbi', 'en_long'),
		'cssc_subgroup_dbj' => i18n::t('cssc_subgroup_dbj', 'en_long'),

		'cssc_subgroup_dca' => i18n::t('cssc_subgroup_dca', 'en_long'),
		'cssc_subgroup_dcb' => i18n::t('cssc_subgroup_dcb', 'en_long'),
		'cssc_subgroup_dcc' => i18n::t('cssc_subgroup_dcc', 'en_long'),
		'cssc_subgroup_dcd' => i18n::t('cssc_subgroup_dcd', 'en_long'),
		'cssc_subgroup_dce' => i18n::t('cssc_subgroup_dce', 'en_long'),
		'cssc_subgroup_dcf' => i18n::t('cssc_subgroup_dcf', 'en_long'),
		'cssc_subgroup_dcg' => i18n::t('cssc_subgroup_dcg', 'en_long'),
		'cssc_subgroup_dch' => i18n::t('cssc_subgroup_dch', 'en_long'),
		'cssc_subgroup_dci' => i18n::t('cssc_subgroup_dci', 'en_long'),
		'cssc_subgroup_dcj' => i18n::t('cssc_subgroup_dcj', 'en_long'),

		'cssc_subgroup_eaa' => i18n::t('cssc_subgroup_eaa', 'en_long'),
		'cssc_subgroup_eab' => i18n::t('cssc_subgroup_eab', 'en_long'),
		'cssc_subgroup_eac' => i18n::t('cssc_subgroup_eac', 'en_long'),
		'cssc_subgroup_ead' => i18n::t('cssc_subgroup_ead', 'en_long'),
		'cssc_subgroup_eae' => i18n::t('cssc_subgroup_eae', 'en_long'),
		'cssc_subgroup_eaf' => i18n::t('cssc_subgroup_eaf', 'en_long'),

		'cssc_subgroup_eba' => i18n::t('cssc_subgroup_eba', 'en_long'), 
		'cssc_subgroup_ebb' => i18n::t('cssc_subgroup_ebb', 'en_long'), 
		'cssc_subgroup_ebc' => i18n::t('cssc_subgroup_ebc', 'en_long'), 
		'cssc_subgroup_ebd' => i18n::t('cssc_subgroup_ebd', 'en_long'), 
		'cssc_subgroup_ebe' => i18n::t('cssc_subgroup_ebe', 'en_long'), 

		'cssc_subgroup_eca' => i18n::t('cssc_subgroup_eca', 'en_long'), 
		'cssc_subgroup_ecb' => i18n::t('cssc_subgroup_ecb', 'en_long'), 
		'cssc_subgroup_ecc' => i18n::t('cssc_subgroup_ecc', 'en_long'), 
		'cssc_subgroup_ecd' => i18n::t('cssc_subgroup_ecd', 'en_long'), 
		'cssc_subgroup_ece' => i18n::t('cssc_subgroup_ece', 'en_long'), 

		'cssc_subgroup_faa' => i18n::t('cssc_subgroup_faa', 'en_long'), 
		'cssc_subgroup_fab' => i18n::t('cssc_subgroup_fab', 'en_long'),
		'cssc_subgroup_fac' => i18n::t('cssc_subgroup_fac', 'en_long'),
		'cssc_subgroup_fad' => i18n::t('cssc_subgroup_fad', 'en_long'),
		'cssc_subgroup_fae' => i18n::t('cssc_subgroup_fae', 'en_long'),
		'cssc_subgroup_faf' => i18n::t('cssc_subgroup_faf', 'en_long'),

		'cssc_subgroup_fba' => i18n::t('cssc_subgroup_fba', 'en_long'),
		'cssc_subgroup_fbb' => i18n::t('cssc_subgroup_fbb', 'en_long'),
		'cssc_subgroup_fbc' => i18n::t('cssc_subgroup_fbc', 'en_long'),
		'cssc_subgroup_fbd' => i18n::t('cssc_subgroup_fbd', 'en_long'),
		'cssc_subgroup_fbe' => i18n::t('cssc_subgroup_fbe', 'en_long'),
		'cssc_subgroup_fbf' => i18n::t('cssc_subgroup_fbf', 'en_long'),
		'cssc_subgroup_fbg' => i18n::t('cssc_subgroup_fbg', 'en_long'),
		'cssc_subgroup_fbh' => i18n::t('cssc_subgroup_fbh', 'en_long'),
		'cssc_subgroup_fbi' => i18n::t('cssc_subgroup_fbi', 'en_long'),
		'cssc_subgroup_fbj' => i18n::t('cssc_subgroup_fbj', 'en_long'),

		'cssc_subgroup_fca' => i18n::t('cssc_subgroup_fca', 'en_long'), 
		'cssc_subgroup_fcb' => i18n::t('cssc_subgroup_fcb', 'en_long'), 
		'cssc_subgroup_fcc' => i18n::t('cssc_subgroup_fcc', 'en_long'), 
		'cssc_subgroup_fcd' => i18n::t('cssc_subgroup_fcd', 'en_long'), 
		'cssc_subgroup_fce' => i18n::t('cssc_subgroup_fce', 'en_long'), 
		'cssc_subgroup_fcf' => i18n::t('cssc_subgroup_fcf', 'en_long'), 
		'cssc_subgroup_fcg' => i18n::t('cssc_subgroup_fcg', 'en_long'), 
		'cssc_subgroup_fch' => i18n::t('cssc_subgroup_fch', 'en_long'), 
		'cssc_subgroup_fci' => i18n::t('cssc_subgroup_fci', 'en_long'), 
		'cssc_subgroup_fcj' => i18n::t('cssc_subgroup_fcj', 'en_long'), 

		'cssc_subgroup_fda' => i18n::t('cssc_subgroup_fda', 'en_long'), 
		'cssc_subgroup_fdb' => i18n::t('cssc_subgroup_fdb', 'en_long'), 
		'cssc_subgroup_fdc' => i18n::t('cssc_subgroup_fdc', 'en_long'), 
		'cssc_subgroup_fdd' => i18n::t('cssc_subgroup_fdd', 'en_long'), 
		'cssc_subgroup_fde' => i18n::t('cssc_subgroup_fde', 'en_long'), 
		'cssc_subgroup_fdf' => i18n::t('cssc_subgroup_fdf', 'en_long'), 
		'cssc_subgroup_fdg' => i18n::t('cssc_subgroup_fdg', 'en_long'), 

		'cssc_subgroup_gaa' => i18n::t('cssc_subgroup_gaa', 'en_long'), 
		'cssc_subgroup_gab' => i18n::t('cssc_subgroup_gab', 'en_long'), 
		'cssc_subgroup_gac' => i18n::t('cssc_subgroup_gac', 'en_long'), 
		'cssc_subgroup_gad' => i18n::t('cssc_subgroup_gad', 'en_long'), 
		'cssc_subgroup_gae' => i18n::t('cssc_subgroup_gae', 'en_long'), 
		'cssc_subgroup_gaf' => i18n::t('cssc_subgroup_gaf', 'en_long'), 
		'cssc_subgroup_gag' => i18n::t('cssc_subgroup_gag', 'en_long'), 
		'cssc_subgroup_gah' => i18n::t('cssc_subgroup_gah', 'en_long'), 
		'cssc_subgroup_gai' => i18n::t('cssc_subgroup_gai', 'en_long'), 
		'cssc_subgroup_gaj' => i18n::t('cssc_subgroup_gaj', 'en_long'), 
		'cssc_subgroup_gak' => i18n::t('cssc_subgroup_gak', 'en_long'), 
		'cssc_subgroup_gal' => i18n::t('cssc_subgroup_gal', 'en_long'), 

		'cssc_subgroup_gba' => i18n::t('cssc_subgroup_gba', 'en_long'), 
		'cssc_subgroup_gbb' => i18n::t('cssc_subgroup_gbb', 'en_long'), 
		'cssc_subgroup_gbc' => i18n::t('cssc_subgroup_gbc', 'en_long'), 
		'cssc_subgroup_gbd' => i18n::t('cssc_subgroup_gbd', 'en_long'), 
		'cssc_subgroup_gbe' => i18n::t('cssc_subgroup_gbe', 'en_long'), 
		'cssc_subgroup_gbf' => i18n::t('cssc_subgroup_gbf', 'en_long'), 
		'cssc_subgroup_gbg' => i18n::t('cssc_subgroup_gbg', 'en_long'), 
		'cssc_subgroup_gbh' => i18n::t('cssc_subgroup_gbh', 'en_long'), 
		'cssc_subgroup_gbi' => i18n::t('cssc_subgroup_gbi', 'en_long'), 
		'cssc_subgroup_gbj' => i18n::t('cssc_subgroup_gbj', 'en_long'), 
		'cssc_subgroup_gbk' => i18n::t('cssc_subgroup_gbk', 'en_long'), 
		'cssc_subgroup_gbl' => i18n::t('cssc_subgroup_gbl', 'en_long'), 

		'cssc_subgroup_gca' => i18n::t('cssc_subgroup_gca', 'en_long'), 
		'cssc_subgroup_gcb' => i18n::t('cssc_subgroup_gcb', 'en_long'),
		'cssc_subgroup_gcc' => i18n::t('cssc_subgroup_gcc', 'en_long'),
		'cssc_subgroup_gcd' => i18n::t('cssc_subgroup_gcd', 'en_long'),
		'cssc_subgroup_gce' => i18n::t('cssc_subgroup_gce', 'en_long'),
		'cssc_subgroup_gcf' => i18n::t('cssc_subgroup_gcf', 'en_long'),
		'cssc_subgroup_gcg' => i18n::t('cssc_subgroup_gcg', 'en_long'),
		'cssc_subgroup_gch' => i18n::t('cssc_subgroup_gch', 'en_long'),
		'cssc_subgroup_gci' => i18n::t('cssc_subgroup_gci', 'en_long'),
		'cssc_subgroup_gcj' => i18n::t('cssc_subgroup_gcj', 'en_long'),
		'cssc_subgroup_gck' => i18n::t('cssc_subgroup_gck', 'en_long'),
		'cssc_subgroup_gcl' => i18n::t('cssc_subgroup_gcl', 'en_long'),

		'cssc_subgroup_gda' => i18n::t('cssc_subgroup_gda', 'en_long'),
		'cssc_subgroup_gdb' => i18n::t('cssc_subgroup_gdb', 'en_long'),
		'cssc_subgroup_gdc' => i18n::t('cssc_subgroup_gdc', 'en_long'),
		'cssc_subgroup_gdd' => i18n::t('cssc_subgroup_gdd', 'en_long'),
		'cssc_subgroup_gde' => i18n::t('cssc_subgroup_gde', 'en_long'),
		'cssc_subgroup_gdf' => i18n::t('cssc_subgroup_gdf', 'en_long'),
		'cssc_subgroup_gdg' => i18n::t('cssc_subgroup_gdg', 'en_long'),
		'cssc_subgroup_gdh' => i18n::t('cssc_subgroup_gdh', 'en_long'),
		'cssc_subgroup_gdi' => i18n::t('cssc_subgroup_gdi', 'en_long'),
		'cssc_subgroup_gdj' => i18n::t('cssc_subgroup_gdj', 'en_long'),

		'cssc_subgroup_haa' => i18n::t('cssc_subgroup_haa', 'en_long'),
		'cssc_subgroup_hab' => i18n::t('cssc_subgroup_hab', 'en_long'),
		'cssc_subgroup_hac' => i18n::t('cssc_subgroup_hac', 'en_long'),
		'cssc_subgroup_had' => i18n::t('cssc_subgroup_had', 'en_long'),
		'cssc_subgroup_hae' => i18n::t('cssc_subgroup_hae', 'en_long'),
		'cssc_subgroup_haf' => i18n::t('cssc_subgroup_haf', 'en_long'),
		'cssc_subgroup_hag' => i18n::t('cssc_subgroup_hag', 'en_long'),
		'cssc_subgroup_hah' => i18n::t('cssc_subgroup_hah', 'en_long'),

		'cssc_subgroup_hba' => i18n::t('cssc_subgroup_hba', 'en_long'),
		'cssc_subgroup_hbb' => i18n::t('cssc_subgroup_hbb', 'en_long'),
		'cssc_subgroup_hbc' => i18n::t('cssc_subgroup_hbc', 'en_long'),
		'cssc_subgroup_hbd' => i18n::t('cssc_subgroup_hbd', 'en_long'),
		'cssc_subgroup_hbe' => i18n::t('cssc_subgroup_hbe', 'en_long'),
		'cssc_subgroup_hbf' => i18n::t('cssc_subgroup_hbf', 'en_long'),
		'cssc_subgroup_hbg' => i18n::t('cssc_subgroup_hbg', 'en_long'),
		'cssc_subgroup_hbh' => i18n::t('cssc_subgroup_hbh', 'en_long'),
		'cssc_subgroup_hbi' => i18n::t('cssc_subgroup_hbi', 'en_long'),
		'cssc_subgroup_hbj' => i18n::t('cssc_subgroup_hbj', 'en_long'),
		'cssc_subgroup_hbk' => i18n::t('cssc_subgroup_hbk', 'en_long'),
		'cssc_subgroup_hbl' => i18n::t('cssc_subgroup_hbl', 'en_long'),
		'cssc_subgroup_hbm' => i18n::t('cssc_subgroup_hbm', 'en_long'),
		'cssc_subgroup_hbn' => i18n::t('cssc_subgroup_hbn', 'en_long'),

		'cssc_subgroup_iaa' => i18n::t('cssc_subgroup_iaa', 'en_long'),
		'cssc_subgroup_iab' => i18n::t('cssc_subgroup_iab', 'en_long'),
		'cssc_subgroup_iac' => i18n::t('cssc_subgroup_iac', 'en_long'),
		'cssc_subgroup_iad' => i18n::t('cssc_subgroup_iad', 'en_long'),

		'cssc_subgroup_iba' => i18n::t('cssc_subgroup_iba', 'en_long'),
		'cssc_subgroup_ibb' => i18n::t('cssc_subgroup_ibb', 'en_long'),
		'cssc_subgroup_ibc' => i18n::t('cssc_subgroup_ibc', 'en_long'),
		'cssc_subgroup_ibd' => i18n::t('cssc_subgroup_ibd', 'en_long'),

		'cssc_subgroup_ica' => i18n::t('cssc_subgroup_ica', 'en_long'),
		'cssc_subgroup_icb' => i18n::t('cssc_subgroup_icb', 'en_long'),
		'cssc_subgroup_icc' => i18n::t('cssc_subgroup_icc', 'en_long'),
		'cssc_subgroup_icd' => i18n::t('cssc_subgroup_icd', 'en_long'),
		'cssc_subgroup_ice' => i18n::t('cssc_subgroup_ice', 'en_long'),

		'cssc_subgroup_ida' => i18n::t('cssc_subgroup_ida', 'en_long'),
		'cssc_subgroup_idb' => i18n::t('cssc_subgroup_idb', 'en_long'),
		'cssc_subgroup_idc' => i18n::t('cssc_subgroup_idc', 'en_long'),
		'cssc_subgroup_idd' => i18n::t('cssc_subgroup_idd', 'en_long'),
		'cssc_subgroup_ide' => i18n::t('cssc_subgroup_ide', 'en_long'),

		'cssc_subgroup_jaa' => i18n::t('cssc_subgroup_jaa', 'en_long'),
		'cssc_subgroup_jab' => i18n::t('cssc_subgroup_jab', 'en_long'),
		'cssc_subgroup_jac' => i18n::t('cssc_subgroup_jac', 'en_long'),
		'cssc_subgroup_jad' => i18n::t('cssc_subgroup_jad', 'en_long'),

		'cssc_subgroup_jba' => i18n::t('cssc_subgroup_jba', 'en_long'),
		'cssc_subgroup_jbb' => i18n::t('cssc_subgroup_jbb', 'en_long'),
		'cssc_subgroup_jbc' => i18n::t('cssc_subgroup_jbc', 'en_long'),
		'cssc_subgroup_jbd' => i18n::t('cssc_subgroup_jbd', 'en_long'),

	), $input['cssc_sub'], array('id' => 'cssc_sub')); }}
</fieldset>
