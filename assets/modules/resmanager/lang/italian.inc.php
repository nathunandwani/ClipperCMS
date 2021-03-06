<?php
/**
 * Resource Manager Module - italian.inc.php
 *
 * Purpose: Contains the language strings for use in the module.
 * Author: Garry Nutting
 * For: MODx CMS (www.modxcms.com)
 * Date:2/01/2009 Version: 1.6.1
 * Translation: Nicola Lambathakis (banzai), luigif   
 */

//-- ITALIAN LANGUAGE FILE

//-- titles
$_lang['RM_module_title'] = 'Gestione Documenti';
$_lang['RM_action_title'] = ' Selezionare un\'azione';
$_lang['RM_range_title'] = 'Specificare gli id dei documenti';
$_lang['RM_tree_title'] = 'Seleziona i Documenti dall\'albero';
$_lang['RM_update_title'] = 'Aggiornamento Completato';
$_lang['RM_sort_title'] = 'Modifica indice del menu';

//-- tabs
$_lang['RM_doc_permissions'] = 'Permessi del documento';
$_lang['RM_template_variables'] = 'Variabili di Template';
$_lang['RM_sort_menu'] = 'Ordina voci di Menu';
$_lang['RM_change_template'] = 'Cambia Template';
$_lang['RM_publish'] = 'Pubblica/Ritira';
$_lang['RM_other'] = 'Altre propriet&agrave;';

//-- buttons
$_lang['RM_close'] = 'Chiudi Gestione Documenti';
$_lang['RM_cancel'] = 'indietro';
$_lang['RM_go'] = 'Vai';
$_lang['RM_save'] = 'Salva';
$_lang['RM_sort_another'] = 'Ordina un altro';

//-- templates tab
$_lang['RM_tpl_desc'] = 'Scegliere il template dall\' elenco e quindi specificare gli id dei documenti a cui applicarlo.';
$_lang['RM_tpl_no_templates'] = 'Nessun template trovato';
$_lang['RM_tpl_column_id'] = 'ID';
$_lang['RM_tpl_column_name'] = 'Nome';
$_lang['RM_tpl_column_description'] ='Descrizione';
$_lang['RM_tpl_blank_template'] = 'Template vuoto';

$_lang['RM_tpl_results_message']= 'Utilizzare il tasto indietro se avete bisogno di fare pi&ugrave; cambiamenti. La cache del sito &egrave; stata pulita automaticamente.';

//-- template variables tab
$_lang['RM_tv_desc'] = 'Scegliere un template dall\'elenco qui sotto e inserire il valore desiderato per le relative variabili di template. Specificare l\' id di un documento (o un intervallo di id) da modificare e fare click su invia per apportare le modifiche.';
$_lang['RM_tv_template_mismatch'] = 'Questo documento non usa il template selezionato.';
$_lang['RM_tv_doc_not_found'] = 'Questo documento non &egrave; stato trovato nel database.';
$_lang['RM_tv_no_tv'] = 'Nessuna variabile di template trovata per questo template.';
$_lang['RM_tv_no_docs'] = 'Nessun documento selezionato per l\'aggiornamento.';
$_lang['RM_tv_no_template_selected'] = 'Nessun template &egrave; stato selezionato.';
$_lang['RM_tv_loading'] = 'Caricamento variabili di template ...';
$_lang['RM_tv_ignore_tv'] = 'Ignora queste variabili di template (valori separati da virgola):';
$_lang['RM_tv_ajax_insertbutton'] = 'Inserisci';

//-- document permissions tab
$_lang['RM_doc_desc'] = ' Scegliere un gruppo di documenti dall\' elenco e si desidera aggiungere o rimuovere il gruppo. Quindi specificare gli id dei documenti che devono essere cambiati.';
$_lang['RM_doc_no_docs'] = 'Nessun gruppo di documenti trovato';
$_lang['RM_doc_column_id'] = 'ID';
$_lang['RM_doc_column_name'] = 'Nome';
$_lang['RM_doc_radio_add'] = 'Aggiungi un gruppo di documenti';
$_lang['RM_doc_radio_remove'] = 'Rimuovi un gruppo di documenti';

$_lang['RM_doc_skip_message1'] = 'Documento con ID';
$_lang['RM_doc_skip_message2'] = 'E\' gia parte del gruppo di documenti selezionato (saltare)';

//-- sort menu tab
$_lang['RM_sort_pick_item'] = 'Seleziona nell\'albero dei documenti la root del sito o il documento genitore del documento che vorresti ordinare.';
$_lang['RM_sort_updating'] = 'Aggiornamento ...';
$_lang['RM_sort_updated'] = 'Aggiornato';
$_lang['RM_sort_nochildren'] = 'Il documento genitore non ha sotto documenti';
$_lang['RM_sort_noid']=' Nessun documento &egrave; stato selezionato. Tornare indietro e selezionare un documento';

//-- other tab
$_lang['RM_other_header'] = ' Impostazioni varie del documento';
$_lang['RM_misc_label'] = 'Impostazioni disponibili:';
$_lang['RM_misc_desc'] = ' Selezionare un\' impostazione dal menu a tendina e la relativa opzione. Attenzione pu&ograve; essere cambiata solo una impostazione alla volta.';

$_lang['RM_other_dropdown_publish'] = 'Pubblica/Ritira';
$_lang['RM_other_dropdown_show'] = 'Mostra/Nascondi nel Menu';
$_lang['RM_other_dropdown_search'] = 'Ricercabile/Non ricercabile';
$_lang['RM_other_dropdown_cache'] = 'Situabile in cache/Non in cache';
$_lang['RM_other_dropdown_richtext'] = 'Richtext/No Richtext Editor';
$_lang['RM_other_dropdown_delete'] = 'Elimina/Ripristina';

//-- radio button text
$_lang['RM_other_publish_radio1'] = 'Pubblica';
$_lang['RM_other_publish_radio2'] = 'Ritira';
$_lang['RM_other_show_radio1'] = 'Nascondi in Menu';
$_lang['RM_other_show_radio2'] = 'Mostra in Menu';
$_lang['RM_other_search_radio1'] = 'Ricercabile';
$_lang['RM_other_search_radio2'] = 'Non ricercabile';
$_lang['RM_other_cache_radio1'] = 'Situabile in cache';
$_lang['RM_other_cache_radio2'] = 'Non in cache';
$_lang['RM_other_richtext_radio1'] = 'Richtext';
$_lang['RM_other_richtext_radio2'] = 'No Richtext';
$_lang['RM_other_delete_radio1'] = 'Elimina';
$_lang['RM_other_delete_radio2'] = 'Ripristina';

//-- adjust dates
$_lang['RM_adjust_dates_header'] = 'Imposta la data del documento';
$_lang['RM_adjust_dates_desc'] = ' Ognuna delle seguenti impostazioni della data del documento puo\' essere cambiata. Usa l\'opzione Vedi Calendario per impostare la data.';
$_lang['RM_view_calendar'] = 'Vedi Calendario';
$_lang['RM_clear_date'] = 'Pulisci data';

//-- adjust authors
$_lang['RM_adjust_authors_header'] = 'Imposta autori';
$_lang['RM_adjust_authors_desc'] = 'Usare i menu a tendina per selezionare i nuovi autori per il documento.';
$_lang['RM_adjust_authors_createdby'] = 'Creato da:';
$_lang['RM_adjust_authors_editedby'] = 'Modificato da:';
$_lang['RM_adjust_authors_noselection'] = 'Nessun cambiamento';

 //-- labels
$_lang['RM_date_pubdate'] = 'Data di pubblicazione:';
$_lang['RM_date_unpubdate'] = 'Data di ritiro:';
$_lang['RM_date_createdon'] = 'Data di creazione:';
$_lang['RM_date_editedon'] = 'Data di modifica:';
//$_lang['RM_date_deletedon'] = 'Data di eliminazione';

$_lang['RM_date_notset'] = ' (non impostato)';
//deprecated
$_lang['RM_date_dateselect_label'] = 'Seleziona una data: ';

//-- document select section
$_lang['RM_select_submit'] = 'Invia';
$_lang['RM_select_range'] = 'Torna indietro a impostare con una gamma di id del documento';
$_lang['RM_select_range_text'] = '<p><strong>Sintassi (dove n &egrave; un numero di id del documento):</strong><br /><br />
							  n* - Cambia le impostazioni per questo documento e il primo livello di sotto documenti<br />
							  n** - Cambia le impostazioni per questo documento e TUTTI i sotto documenti<br />
							  n-n2 - Cambia le impostazioni per questo intervallo di documenti<br />
							  n - Cambia le impostazioni per un solo documento</p>
							  <p>Esempio: 1*,4**,2-20,25 - Cambia le impostazioni per il documento 1 e i sotto documenti, il documento 4 e tutti i sotto documenti, i documenti da 2
						      a 20 e il documento 25.</p>';
$_lang['RM_select_tree'] =' Visualizza e seleziona i documenti usando l\'albero dei documenti';

//-- process tree/range messages
$_lang['RM_process_noselection'] = 'Non &egrave; stata effettuata nessuna selezione. ';
$_lang['RM_process_novalues'] = 'Non &egrave; stato specificato alcun valore.';
$_lang['RM_process_limits_error'] = 'Limite superiore pi&ugrave; basso del limite inferiore:';
$_lang['RM_process_invalid_error'] = 'Valore non valido:';
$_lang['RM_process_update_success'] = 'L\'aggiornamento &egrave; stato completato con successo, senza errori.';
$_lang['RM_process_update_error'] = 'L\'aggiornamento &egrave; stato completato, ma con errori :';
$_lang['RM_process_back'] = 'Indietro';

//-- manager access logging
$_lang['RM_log_template'] = 'Gestione Documenti: Template sostituiti.';
$_lang['RM_log_templatevariables'] = 'Gestione Documenti: modificate le Variabili di Template.';
$_lang['RM_log_docpermissions'] ='Gestione Documenti: Permessi dei documenti cambiati.';
$_lang['RM_log_sortmenu']='Gestione Documenti: Modifica indice del menu completata.';
$_lang['RM_log_publish']='Gestione Documenti: Impostazioni documenti Pubblicato/Ritirato modificate.';
$_lang['RM_log_hidemenu']='Gestione Documenti: Impostazioni documenti Mostra/Nascondi nel Menu  modificate.';
$_lang['RM_log_search']='Gestione Documenti: Impostazioni documenti Ricercabile/Non ricercabile modificate.';
$_lang['RM_log_cache']='Gestione Documenti: Impostazioni documenti Documents Situabile in cache/Non in cache modificate.';
$_lang['RM_log_richtext']='Gestione Documenti: Impostazioni documenti Usa Richtext Editor modificate.';
$_lang['RM_log_delete']='Gestione Documenti: Impostazioni documenti Cancella/Ripristina modificate.';
$_lang['RM_log_dates']='Gestione Documenti: Impostazioni Data dei documenti modificate.';
$_lang['RM_log_authors']='Gestione Documenti: Impostazioni Autore dei documenti modificate.';

?>
