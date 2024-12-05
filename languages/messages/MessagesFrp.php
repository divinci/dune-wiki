<?php
/** Franco-Provençal (arpetan)
 *
 * @file
 * @ingroup Languages
 */

$fallback = 'fr';

$bookstoreList = [
	'Amazon.fr'    => 'https://www.amazon.fr/exec/obidos/ISBN=$1',
	'alapage.fr'   => 'http://www.alapage.com/mx/?tp=F&type=101&l_isbn=$1&donnee_appel=ALASQ&devise=&',
	'fnac.com'     => 'http://www3.fnac.com/advanced/book.do?isbn=$1',
	'chapitre.com' => 'http://www.chapitre.com/frame_rec.asp?isbn=$1',
];

$namespaceNames = [
	NS_MEDIA            => 'Mèdia',
	NS_SPECIAL          => 'Spèciâl',
	NS_TALK             => 'Discussion',
	NS_USER             => 'Utilisator',
	NS_USER_TALK        => 'Discussion_utilisator',
	NS_PROJECT_TALK     => 'Discussion_$1',
	NS_FILE             => 'Fichiér',
	NS_FILE_TALK        => 'Discussion_fichiér',
	NS_MEDIAWIKI        => 'MediaWiki',
	NS_MEDIAWIKI_TALK   => 'Discussion_MediaWiki',
	NS_TEMPLATE         => 'Modèlo',
	NS_TEMPLATE_TALK    => 'Discussion_modèlo',
	NS_HELP             => 'Éde',
	NS_HELP_TALK        => 'Discussion_éde',
	NS_CATEGORY         => 'Catègorie',
	NS_CATEGORY_TALK    => 'Discussion_catègorie',
];

$namespaceAliases = [
	'Discutar'              => NS_TALK,
	'Usanciér'              => NS_USER,
	'Discussion_usanciér'   => NS_USER_TALK,
	'Émâge'                 => NS_FILE,
	'Discussion_Émâge'      => NS_FILE_TALK,
	'Discussion_Modèlo'     => NS_TEMPLATE_TALK,
	'Discussion_Éde'        => NS_HELP_TALK,
	'Discussion_Catègorie'  => NS_CATEGORY_TALK
];

// Remove French aliases
$namespaceGenderAliases = [];

/** @phpcs-require-sorted-array */
$specialPageAliases = [
	'Activeusers'               => [ 'Usanciérs_actifs', 'UsanciérsActifs' ],
	'Allmessages'               => [ 'Mèssâjos_sistèmo', 'MèssâjosSistèmo' ],
	'Allpages'                  => [ 'Totes_les_pâges', 'TotesLesPâges' ],
	'Ancientpages'              => [ 'Pâges_les_muens_dèrriérement_changiês', 'PâgesLesMuensDèrriérementChangiês' ],
	'Blankpage'                 => [ 'Pâge_voueda', 'PâgeVoueda' ],
	'Block'                     => [ 'Blocar', 'Blocâjo' ],
	'BlockList'                 => [ 'Lista_des_blocâjos', 'ListaDesBlocâjos', 'Blocâjos', 'Usanciérs_blocâs', 'UsanciérsBlocâs', 'Adrèces_IP_blocâs', 'AdrècesIPBlocâs' ],
	'Booksources'               => [ 'Ôvres_de_refèrence', 'ÔvresDeRefèrence' ],
	'BrokenRedirects'           => [ 'Redirèccions_câsses', 'RedirèccionsCâsses' ],
	'Categories'                => [ 'Catègories' ],
	'ChangePassword'            => [ 'Changement_de_contresegno', 'ChangementDeContresegno' ],
	'Confirmemail'              => [ 'Confirmar_l\'adrèce_èlèctronica', 'ConfirmarLAdrèceÈlèctronica' ],
	'Contributions'             => [ 'Contribucions' ],
	'CreateAccount'             => [ 'Fâre_un_compto', 'FâreUnCompto' ],
	'Deadendpages'              => [ 'Pâges_en_cul-de-sac', 'PâgesEnCulDeSac' ],
	'DeletedContributions'      => [ 'Contribucions_suprimâs', 'ContribucionsSuprimâs' ],
	'DoubleRedirects'           => [ 'Redirèccions_dobles', 'RedirèccionsDobles' ],
	'Emailuser'                 => [ 'Mandar_un_mèssâjo', 'MandarUnMèssâjo', 'Mèssâjo' ],
	'ExpandTemplates'           => [ 'Èxpension_des_modèlos', 'ÈxpensionDesModèlos' ],
	'Export'                    => [ 'Èxportar', 'Èxportacion' ],
	'Fewestrevisions'           => [ 'Pâges_les_muens_changiês', 'PâgesLesMuensChangiês' ],
	'FileDuplicateSearch'       => [ 'Rechèrche_des_fichiérs_en_doblo', 'RechèrcheDesFichiérsEnDoblo' ],
	'Filepath'                  => [ 'Chemin_d\'accès_du_fichiér', 'CheminDAccèsDuFichiér' ],
	'Import'                    => [ 'Importar', 'Importacion' ],
	'Interwiki'                 => [ 'Entèrvouiqui' ],
	'Invalidateemail'           => [ 'Envalidar_l\'adrèce_èlèctronica', 'EnvalidarLAdrèceÈlèctronica' ],
	'LinkSearch'                => [ 'Rechèrche_de_lims', 'RechèrcheDeLims' ],
	'Listadmins'                => [ 'Lista_ux_administrators', 'ListaUxAdministrators' ],
	'Listbots'                  => [ 'Lista_ux_bots', 'ListaUxBots' ],
	'Listfiles'                 => [ 'Lista_des_fichiérs', 'ListaDesFichiérs', 'Lista_de_les_émâges', 'ListaDeLesÉmâges' ],
	'Listgrouprights'           => [ 'Lista_des_drêts_a_les_tropes_d\'usanciérs', 'ListaDesDrêtsALesTropesDUsanciérs' ],
	'Listredirects'             => [ 'Lista_de_les_redirèccions', 'ListaDeLesRedirèccions' ],
	'Listusers'                 => [ 'Lista_ux_usanciérs', 'ListaUxUsanciérs', 'Usanciérs' ],
	'Lockdb'                    => [ 'Vèrrolyér_la_bâsa_de_balyês', 'VèrrolyérLaBâsaDeBalyês' ],
	'Log'                       => [ 'Jornal', 'Jornals' ],
	'Lonelypages'               => [ 'Pâges_orfenes', 'PâgesOrfenes' ],
	'Longpages'                 => [ 'Pâges_longes', 'PâgesLonges' ],
	'MergeHistory'              => [ 'Fusionar_los_historicos', 'FusionarLosHistoricos' ],
	'MIMEsearch'                => [ 'Rechèrche_per_tipo_de_contegnu_MIME', 'RechèrchePerTipoDeContegnuMIME' ],
	'Mostcategories'            => [ 'Pâges_utilisent_lo_més_de_catègories', 'PâgesUtilisentLoMésDeCatègories' ],
	'Mostimages'                => [ 'Fichiérs_los_ples_liyês', 'FichiérsLosPlesLiyês', 'Fichiérs_los_ples_utilisâs', 'FichiérsLosPlesUtilisâs', 'Émâges_les_ples_liyês', 'ÉmâgesLesPlesLiyês', 'Émâges_les_ples_utilisâs', 'ÉmâgesLesPlesUtilisâs' ],
	'Mostlinked'                => [ 'Pâges_les_ples_liyês', 'PâgesLesPlesLiyês' ],
	'Mostlinkedcategories'      => [ 'Catègories_les_ples_liyês', 'CatègoriesLesPlesLiyês', 'Catègories_les_ples_utilisâs', 'CatègoriesLesPlesUtilisâs' ],
	'Mostlinkedtemplates'       => [ 'Modèlos_los_ples_liyês', 'ModèlosLosPlesLiyês', 'Modèlos_los_ples_utilisâs', 'ModèlosLosPlesUtilisâs' ],
	'Mostrevisions'             => [ 'Pâges_les_ples_changiês', 'PâgesLesPlesChangiês' ],
	'Movepage'                  => [ 'Renomar_una_pâge', 'RenomarUnaPâge', 'Changement_de_nom', 'ChangementDeNom' ],
	'Mycontributions'           => [ 'Mes_contribucions', 'MesContribucions' ],
	'Mypage'                    => [ 'Ma_pâge', 'MaPâge' ],
	'Mytalk'                    => [ 'Mes_discussions', 'MesDiscussions' ],
	'Newimages'                 => [ 'Novéls_fichiérs', 'NovélsFichiérs', 'Émâges_novèles', 'ÉmâgesNovèles' ],
	'Newpages'                  => [ 'Pâges_novèles', 'PâgesNovèles' ],
	'PermanentLink'             => [ 'Lim_fixo', 'LimFixo' ],
	'Preferences'               => [ 'Prèferences' ],
	'Prefixindex'               => [ 'Endèxe_des_prèfixos', 'EndèxeDesPrèfixos' ],
	'Protectedpages'            => [ 'Pâges_protègiês', 'PâgesProtègiês' ],
	'Protectedtitles'           => [ 'Titros_protègiês', 'TitrosProtègiês' ],
	'RandomInCategory'          => [ 'Pâge_a_l\'hasârd_dens_una_catègorie', 'PâgeALHasârdDensUnaCatègorie' ],
	'Randompage'                => [ 'Pâge_a_l\'hasârd', 'PâgeALHasârd' ],
	'Randomredirect'            => [ 'Redirèccion_a_l\'hasârd', 'RedirèccionALHasârd' ],
	'Recentchanges'             => [ 'Dèrriérs_changements', 'DèrriérsChangements' ],
	'Recentchangeslinked'       => [ 'Survelyence_des_lims', 'SurvelyenceDesLims' ],
	'Renameuser'                => [ 'Renomar_l\'usanciér', 'RenomarLUsanciér' ],
	'Revisiondelete'            => [ 'Vèrsions_suprimâs', 'VèrsionsSuprimâs' ],
	'Search'                    => [ 'Rechèrchiér', 'Rechèrche' ],
	'Shortpages'                => [ 'Pâges_côrtes', 'PâgesCôrtes' ],
	'Specialpages'              => [ 'Pâges_spèciâles', 'PâgesSpèciâles' ],
	'Statistics'                => [ 'Statistiques' ],
	'Tags'                      => [ 'Balises' ],
	'Uncategorizedcategories'   => [ 'Catègories_sen_catègorie', 'CatègoriesSenCatègorie' ],
	'Uncategorizedimages'       => [ 'Fichiérs_sen_catègorie', 'FichiérsSenCatègorie', 'Émâges_sen_catègorie', 'ÉmâgesSenCatègorie' ],
	'Uncategorizedpages'        => [ 'Pâges_sen_catègorie', 'PâgesSenCatègorie' ],
	'Uncategorizedtemplates'    => [ 'Modèlos_sen_catègorie', 'ModèlosSenCatègorie' ],
	'Undelete'                  => [ 'Refâre', 'Rèstoracion' ],
	'Unlockdb'                  => [ 'Dèvèrrolyér_la_bâsa_de_balyês', 'DèvèrrolyérLaBâsaDeBalyês' ],
	'Unusedcategories'          => [ 'Catègories_inutilisâs', 'CatègoriesInutilisâs' ],
	'Unusedimages'              => [ 'Fichiérs_inutilisâs', 'FichiérsInutilisâs', 'Émâges_inutilisâs', 'ÉmâgesInutilisâs' ],
	'Unusedtemplates'           => [ 'Modèlos_inutilisâs', 'ModèlosInutilisâs' ],
	'Unwatchedpages'            => [ 'Pâges_pas_siuvues', 'PâgesPasSiuvues' ],
	'Upload'                    => [ 'Tèlèchargiér', 'Tèlèchargement' ],
	'Userlogin'                 => [ 'Branchiér', 'Branchement' ],
	'Userlogout'                => [ 'Dèbranchiér', 'Dèbranchement' ],
	'Userrights'                => [ 'Drêts_d\'usanciér', 'DrêtsDUsanciér' ],
	'Version'                   => [ 'Vèrsion' ],
	'Wantedcategories'          => [ 'Catègories_les_ples_demandâs', 'CatègoriesLesPlesDemandâs' ],
	'Wantedfiles'               => [ 'Fichiérs_los_ples_demandâs', 'FichiérsLosPlesDemandâs' ],
	'Wantedpages'               => [ 'Pâges_les_ples_demandâs', 'PâgesLesPlesDemandâs', 'Lims_câssos', 'LimsCâssos' ],
	'Wantedtemplates'           => [ 'Modèlos_los_ples_demandâs', 'ModèlosLosPlesDemandâs' ],
	'Watchlist'                 => [ 'Lista_de_survelyence', 'ListaDeSurvelyence', 'Survelyence' ],
	'Whatlinkshere'             => [ 'Pâges_liyês', 'PâgesLiyês' ],
	'Withoutinterwiki'          => [ 'Pâges_sen_lims_entèrlengoues', 'PâgesSenLimsEntèrlengoues', 'Pâges_sen_lims_entèrvouiqui', 'PâgesSenLimsEntèrvouiqui' ],
];

/** @phpcs-require-sorted-array */
$magicWords = [
	'anchorencode'              => [ '0', 'ANCRO_ENCODÂ', 'ENCODEANCRE', 'ANCHORENCODE' ],
	'articlepath'               => [ '0', 'CHEMIN_DE_L_ARTICLLO', 'CHEMINARTICLE', 'ARTICLEPATH' ],
	'basepagename'              => [ '1', 'NOM_DE_LA_PÂGE_DE_BÂSA', 'NOMBASEDEPAGE', 'BASEPAGENAME' ],
	'basepagenamee'             => [ '1', 'NOM_DE_LA_PÂGE_DE_BÂSA_URL', 'NOMBASEDEPAGEX', 'BASEPAGENAMEE' ],
	'contentlanguage'           => [ '1', 'LENGOUA_DU_CONTEGNU', 'LANGUECONTENU', 'LANGCONTENU', 'CONTENTLANGUAGE', 'CONTENTLANG' ],
	'currentday'                => [ '1', 'JORN_D_ORA', 'JOURACTUEL', 'JOUR1ACTUEL', 'CURRENTDAY' ],
	'currentday2'               => [ '1', 'JORN_D_ORA_2', 'JOUR2ACTUEL', 'CURRENTDAY2' ],
	'currentdayname'            => [ '1', 'NOM_DU_JORN_D_ORA', 'NOMJOURACTUEL', 'CURRENTDAYNAME' ],
	'currentdow'                => [ '1', 'JDS_D_ORA', 'JDSACTUEL', 'CURRENTDOW' ],
	'currenthour'               => [ '1', 'HORA_D_ORA', 'HEUREACTUELLE', 'CURRENTHOUR' ],
	'currentmonth'              => [ '1', 'MÊS_D_ORA', 'MÊS_D_ORA_2', 'MOISACTUEL', 'MOIS2ACTUEL', 'CURRENTMONTH', 'CURRENTMONTH2' ],
	'currentmonth1'             => [ '1', 'MÊS_D_ORA_1', 'MOIS1ACTUEL', 'CURRENTMONTH1' ],
	'currentmonthabbrev'        => [ '1', 'ABRÈV_DU_MÊS_D_ORA', 'ABREVMOISACTUEL', 'CURRENTMONTHABBREV' ],
	'currentmonthname'          => [ '1', 'NOM_DU_MÊS_D_ORA', 'NOMMOISACTUEL', 'CURRENTMONTHNAME' ],
	'currentmonthnamegen'       => [ '1', 'GÈNITIF_DU_NOM_DU_MÊS_D_ORA', 'NOMGENMOISACTUEL', 'CURRENTMONTHNAMEGEN' ],
	'currenttime'               => [ '1', 'HORÈRO_D_ORA', 'HORAIREACTUEL', 'CURRENTTIME' ],
	'currenttimestamp'          => [ '1', 'DÂTA_ET_HORA_D_ORA', 'INSTANTACTUEL', 'CURRENTTIMESTAMP' ],
	'currentversion'            => [ '1', 'VÈRSION_D_ORA', 'VERSIONACTUELLE', 'CURRENTVERSION' ],
	'currentweek'               => [ '1', 'SEMANA_D_ORA', 'SEMAINEACTUELLE', 'CURRENTWEEK' ],
	'currentyear'               => [ '1', 'AN_D_ORA', 'ANNEEACTUELLE', 'CURRENTYEAR' ],
	'defaultsort'               => [ '1', 'CLLÂF_DE_TRI:', 'CLEFDETRI:', 'CLEDETRI:', 'DEFAULTSORT:', 'DEFAULTSORTKEY:', 'DEFAULTCATEGORYSORT:' ],
	'directionmark'             => [ '1', 'MÂRCA_DE_DIRÈCCION', 'MARQUEDIRECTION', 'MARQUEDIR', 'DIRECTIONMARK', 'DIRMARK' ],
	'displaytitle'              => [ '1', 'FÂRE_VÊRE_LO_TITRO', 'AFFICHERTITRE', 'DISPLAYTITLE' ],
	'filepath'                  => [ '0', 'CHEMIN_D_ACCÈS:', 'CHEMIN:', 'FILEPATH:' ],
	'forcetoc'                  => [ '0', '__FORCIÉR_LO_SOMÈRO__', '__FORCIÉR_LA_TRÂBLA__', '__FORCERSOMMAIRE__', '__FORCERTDM__', '__FORCETOC__' ],
	'formatdate'                => [ '0', 'format_de_dâta', 'formatdate', 'dateformat' ],
	'formatnum'                 => [ '0', 'FORMAT_NOMBRO', 'FORMATNOMBRE', 'FORMATNUM' ],
	'fullpagename'              => [ '1', 'NOM_COMPLÈT_DE_LA_PÂGE', 'NOMPAGECOMPLET', 'FULLPAGENAME' ],
	'fullpagenamee'             => [ '1', 'NOM_COMPLÈT_DE_LA_PÂGE_URL', 'NOMPAGECOMPLETX', 'FULLPAGENAMEE' ],
	'fullurl'                   => [ '0', 'URL_COMPLÈTA:', 'URLCOMPLETE:', 'FULLURL:' ],
	'fullurle'                  => [ '0', 'URL_COMPLÈTA_URL:', 'URLCOMPLETEX:', 'FULLURLE:' ],
	'gender'                    => [ '0', 'GENRO:', 'GENRE:', 'GENDER:' ],
	'grammar'                   => [ '0', 'GRAMÈRE:', 'GRAMMAIRE:', 'GRAMMAR:' ],
	'hiddencat'                 => [ '1', '__CATÈGORIE_CACHIÊ__', '__CATCACHEE__', '__HIDDENCAT__' ],
	'img_baseline'              => [ '1', 'legne_de_bâsa', 'ligne_de_base', 'base', 'ligne-de-base', 'baseline' ],
	'img_border'                => [ '1', 'bordura', 'bordure', 'border' ],
	'img_bottom'                => [ '1', 'd\'avâl', 'bas', 'bottom' ],
	'img_center'                => [ '1', 'centrâ', 'centré', 'center', 'centre' ],
	'img_framed'                => [ '1', 'encâdrâ', 'câdro', 'cadre', 'encadré', 'encadre', 'frame', 'framed', 'enframed' ],
	'img_frameless'             => [ '1', 'sen_câdro', 'pas_encâdrâ', 'sans_cadre', 'non_encadré', 'non_encadre', 'frameless' ],
	'img_left'                  => [ '1', 'gôche', 'gauche', 'left' ],
	'img_link'                  => [ '1', 'lim=$1', 'lien=$1', 'link=$1' ],
	'img_manualthumb'           => [ '1', 'figura=$1', 'vignette=$1', 'thumbnail=$1', 'thumb=$1' ],
	'img_middle'                => [ '1', 'entre-mié', 'milieu', 'middle' ],
	'img_none'                  => [ '1', 'vouedo', 'néant', 'neant', 'none' ],
	'img_page'                  => [ '1', 'pâge=$1', 'pâge $1', 'page=$1', 'page $1' ],
	'img_right'                 => [ '1', 'drêta', 'droite', 'right' ],
	'img_sub'                   => [ '1', 'segno', 'indice', 'ind', 'sub' ],
	'img_super'                 => [ '1', 'èxposent', 'èxp', 'exposant', 'exp', 'super', 'sup' ],
	'img_text_bottom'           => [ '1', 'tèxto-d\'avâl', 'bas-texte', 'bas-txt', 'text-bottom' ],
	'img_text_top'              => [ '1', 'tèxto-d\'amont', 'haut-texte', 'haut-txt', 'text-top' ],
	'img_thumbnail'             => [ '1', 'figura', 'vignette', 'thumb', 'thumbnail' ],
	'img_top'                   => [ '1', 'd\'amont', 'haut', 'top' ],
	'img_upright'               => [ '1', 'drêt', 'drêt=$1', 'drêt $1', 'redresse', 'redresse=$1', 'redresse $1', 'redresse_$1', 'upright', 'upright=$1', 'upright $1' ],
	'index'                     => [ '1', '__ENDÈXE__', '__INDEX__' ],
	'int'                       => [ '0', 'ENT:', 'INT:' ],
	'language'                  => [ '0', '#LENGOUA', '#LANGUE', '#LANGUAGE' ],
	'lc'                        => [ '0', 'PETIÔTA_LÈTRA:', 'MINUS:', 'LC:' ],
	'lcfirst'                   => [ '0', 'PREMIÉRE_PETIÔTA_LÈTRA:', 'INITMINUS:', 'LCFIRST:' ],
	'localday'                  => [ '1', 'JORN_LOCAL', 'JOURLOCAL', 'JOUR1LOCAL', 'LOCALDAY' ],
	'localday2'                 => [ '1', 'JORN_LOCAL_2', 'JOUR2LOCAL', 'LOCALDAY2' ],
	'localdayname'              => [ '1', 'NOM_DU_JORN_LOCAL', 'NOMJOURLOCAL', 'LOCALDAYNAME' ],
	'localdow'                  => [ '1', 'JDS_LOCAL', 'JDSLOCAL', 'LOCALDOW' ],
	'localhour'                 => [ '1', 'HORA_LOCALA', 'HEURELOCALE', 'LOCALHOUR' ],
	'localmonth'                => [ '1', 'MÊS_LOCAL', 'MÊS_LOCAL_2', 'MOISLOCAL', 'MOIS2LOCAL', 'LOCALMONTH', 'LOCALMONTH2' ],
	'localmonth1'               => [ '1', 'MÊS_LOCAL_1', 'MOIS1LOCAL', 'LOCALMONTH1' ],
	'localmonthabbrev'          => [ '1', 'ABRÈV_DU_MÊS_LOCAL', 'ABREVMOISLOCAL', 'LOCALMONTHABBREV' ],
	'localmonthname'            => [ '1', 'NOM_DU_MÊS_LOCAL', 'NOMMOISLOCAL', 'LOCALMONTHNAME' ],
	'localmonthnamegen'         => [ '1', 'GÈNITIF_DU_NOM_DU_MÊS_LOCAL', 'NOMGENMOISLOCAL', 'LOCALMONTHNAMEGEN' ],
	'localtime'                 => [ '1', 'HORÈRO_LOCAL', 'HORAIRELOCAL', 'LOCALTIME' ],
	'localtimestamp'            => [ '1', 'DÂTA_ET_HORA_LOCALA', 'INSTANTLOCAL', 'LOCALTIMESTAMP' ],
	'localurl'                  => [ '0', 'URL_LOCALA:', 'URLLOCALE:', 'LOCALURL:' ],
	'localurle'                 => [ '0', 'URL_LOCALA_URL:', 'URLLOCALEX:', 'LOCALURLE:' ],
	'localweek'                 => [ '1', 'SEMANA_LOCALA', 'SEMAINELOCALE', 'LOCALWEEK' ],
	'localyear'                 => [ '1', 'AN_LOCAL', 'ANNEELOCALE', 'LOCALYEAR' ],
	'msg'                       => [ '0', 'MSJ:', 'MSG:' ],
	'msgnw'                     => [ '0', 'MSJNV:', 'MSGNW:' ],
	'namespace'                 => [ '1', 'ÈSPÂÇO_DE_NOMS', 'ESPACENOMMAGE', 'NAMESPACE' ],
	'namespacee'                => [ '1', 'ÈSPÂÇO_DE_NOMS_URL', 'ESPACENOMMAGEX', 'NAMESPACEE' ],
	'newsectionlink'            => [ '1', '__LIM_DE_NOVÈLA_SÈCCION__', '__LIENNOUVELLESECTION__', '__NEWSECTIONLINK__' ],
	'nocontentconvert'          => [ '0', '__SEN_CONVÈRSION_DE_CONTEGNU__', '__SENCDC__', '__SANSCONVERSIONCONTENU__', '__SANSCC__', '__NOCONTENTCONVERT__', '__NOCC__' ],
	'noeditsection'             => [ '0', '__SÈCCION_QUE_PÔT_PAS_ÉTRE_CHANGIÊ__', '__SECTIONNONEDITABLE__', '__NOEDITSECTION__' ],
	'nogallery'                 => [ '0', '__NIONA_GALERIE__', '__AUCUNEGALERIE__', '__NOGALLERY__' ],
	'noindex'                   => [ '1', '__NION_ENDÈXE__', '__AUCUNINDEX__', '__NOINDEX__' ],
	'nonewsectionlink'          => [ '1', '__NION_LIM_DE_NOVÈLA_SÈCCION__', '__AUCUNLIENNOUVELLESECTION__', '__NONEWSECTIONLINK__' ],
	'notitleconvert'            => [ '0', '__SEN_CONVÈRSION_DE_TITRO__', '__SENCDT__', '__SANSCONVERSIONTITRE__', '__SANSCT__', '__NOTITLECONVERT__', '__NOTC__' ],
	'notoc'                     => [ '0', '__NION_SOMÈRO__', '__NIONA_TRÂBLA__', '__AUCUNSOMMAIRE__', '__AUCUNETDM__', '__NOTOC__' ],
	'ns'                        => [ '0', 'ÈDN:', 'ESPACEN:', 'NS:' ],
	'nse'                       => [ '0', 'ÈDN_URL:', 'ESPACENX:', 'NSE:' ],
	'numberingroup'             => [ '1', 'NOMBRO_D_USANCIÉRS_DENS_LA_TROPA', 'NOMBREDANSGROUPE', 'NBDANSGROUPE', 'NUMBERINGROUP', 'NUMINGROUP' ],
	'numberofactiveusers'       => [ '1', 'NOMBRO_D_USANCIÉRS_ACTIFS', 'NOMBREUTILISATEURSACTIFS', 'NUMBEROFACTIVEUSERS' ],
	'numberofadmins'            => [ '1', 'NOMBRO_D_ADMINS', 'NOMBREADMINS', 'NUMBEROFADMINS' ],
	'numberofarticles'          => [ '1', 'NOMBRO_D_ARTICLLOS', 'NOMBREARTICLES', 'NUMBEROFARTICLES' ],
	'numberofedits'             => [ '1', 'NOMBRO_DE_CHANGEMENTS', 'NOMBREMODIFS', 'NUMBEROFEDITS' ],
	'numberoffiles'             => [ '1', 'NOMBRO_DE_FICHIÉRS', 'NOMBREFICHIERS', 'NUMBEROFFILES' ],
	'numberofpages'             => [ '1', 'NOMBRO_DE_PÂGES', 'NOMBREPAGES', 'NUMBEROFPAGES' ],
	'numberofusers'             => [ '1', 'NOMBRO_D_USANCIÉRS', 'NOMBREUTILISATEURS', 'NUMBEROFUSERS' ],
	'padleft'                   => [ '0', 'BORRÂJO_A_GÔCHE', 'BOURRAGEGAUCHE', 'BOURREGAUCHE', 'PADLEFT' ],
	'padright'                  => [ '0', 'BORRÂJO_A_DRÊTA', 'BOURRAGEDROITE', 'BOURREDROITE', 'PADRIGHT' ],
	'pagename'                  => [ '1', 'NOM_DE_LA_PÂGE', 'NOMPAGE', 'PAGENAME' ],
	'pagenamee'                 => [ '1', 'NOM_DE_LA_PÂGE_URL', 'NOMPAGEX', 'PAGENAMEE' ],
	'pagesincategory'           => [ '1', 'PÂGES_DENS_LA_CATÈGORIE', 'PAGESDANSCAT', 'PAGESINCATEGORY', 'PAGESINCAT' ],
	'pagesinnamespace'          => [ '1', 'PÂGES_DENS_L_ÈSPÂÇO_DE_NOMS:', 'PÂGES_DENS_L_ÈDN:', 'PAGESDANSESPACE:', 'PAGESINNAMESPACE:', 'PAGESINNS:' ],
	'pagesize'                  => [ '1', 'TALYE_DE_LA_PÂGE', 'TAILLEPAGE', 'PAGESIZE' ],
	'plural'                    => [ '0', 'PLURÂL:', 'PLURIEL:', 'PLURAL:' ],
	'protectionlevel'           => [ '1', 'NIVÉL_DE_PROTÈCCION', 'NIVEAUDEPROTECTION', 'PROTECTIONLEVEL' ],
	'raw'                       => [ '0', 'BRUTO:', 'BRUT:', 'RAW:' ],
	'rawsuffix'                 => [ '1', 'B', 'BRUT', 'R' ],
	'redirect'                  => [ '0', '#REDIRÈCCION', '#REDIRECTION', '#REDIRECT' ],
	'revisionday'               => [ '1', 'JORN_DE_LA_VÈRSION', 'JOURVERSION', 'JOUR1VERSION', 'REVISIONDAY' ],
	'revisionday2'              => [ '1', 'JORN_DE_LA_VÈRSION_2', 'JOUR2VERSION', 'REVISIONDAY2' ],
	'revisionid'                => [ '1', 'NUMERÔ_DE_LA_VÈRSION', 'IDVERSION', 'REVISIONID' ],
	'revisionmonth'             => [ '1', 'MÊS_DE_LA_VÈRSION', 'MOISVERSION', 'REVISIONMONTH' ],
	'revisionmonth1'            => [ '1', 'MÊS_DE_LA_VÈRSION_1', 'MOISVERSION1', 'REVISIONMONTH1' ],
	'revisiontimestamp'         => [ '1', 'DÂTA_ET_HORA_DE_LA_VÈRSION', 'INSTANTVERSION', 'REVISIONTIMESTAMP' ],
	'revisionuser'              => [ '1', 'USANCIÉR_DE_LA_VÈRSION', 'UTILISATEURVERSION', 'REVISIONUSER' ],
	'revisionyear'              => [ '1', 'AN_DE_LA_VÈRSION', 'ANNEEVERSION', 'REVISIONYEAR' ],
	'scriptpath'                => [ '0', 'CHEMIN_DU_SCRIPTE', 'CHEMINSCRIPT', 'SCRIPTPATH' ],
	'server'                    => [ '0', 'SÈRVOR', 'SERVEUR', 'SERVER' ],
	'servername'                => [ '0', 'NOM_DU_SÈRVOR', 'NOMSERVEUR', 'SERVERNAME' ],
	'sitename'                  => [ '1', 'NOM_DU_SETO', 'NOMSITE', 'SITENAME' ],
	'special'                   => [ '0', 'spèciâl', 'spécial', 'special' ],
	'staticredirect'            => [ '1', '__REDIRÈCCION_IMOBILA__', '__REDIRECTIONSTATIQUE__', '__STATICREDIRECT__' ],
	'stylepath'                 => [ '0', 'CHEMIN_DU_STILO', 'CHEMINSTYLE', 'STYLEPATH' ],
	'subjectpagename'           => [ '1', 'NOM_DE_LA_PÂGE_DU_SUJÈT', 'NOM_DE_LA_PÂGE_DE_L_ARTICLLO', 'NOMPAGESUJET', 'NOMPAGEARTICLE', 'SUBJECTPAGENAME', 'ARTICLEPAGENAME' ],
	'subjectpagenamee'          => [ '1', 'NOM_DE_LA_PÂGE_DU_SUJÈT_URL', 'NOM_DE_LA_PÂGE_DE_L_ARTICLLO_URL', 'NOMPAGESUJETX', 'NOMPAGEARTICLEX', 'SUBJECTPAGENAMEE', 'ARTICLEPAGENAMEE' ],
	'subjectspace'              => [ '1', 'ÈSPÂÇO_DU_SUJÈT', 'ÈSPÂÇO_DE_L_ARTICLLO', 'ESPACESUJET', 'ESPACEARTICLE', 'SUBJECTSPACE', 'ARTICLESPACE' ],
	'subjectspacee'             => [ '1', 'ÈSPÂÇO_DU_SUJÈT_URL', 'ÈSPÂÇO_DE_L_ARTICLLO_URL', 'ESPACESUJETX', 'ESPACEARTICLEX', 'SUBJECTSPACEE', 'ARTICLESPACEE' ],
	'subpagename'               => [ '1', 'NOM_DE_LA_SOT_PÂGE', 'NOMSOUSPAGE', 'SUBPAGENAME' ],
	'subpagenamee'              => [ '1', 'NOM_DE_LA_SOT_PÂGE_URL', 'NOMSOUSPAGEX', 'SUBPAGENAMEE' ],
	'tag'                       => [ '0', 'balisa', 'balise', 'tag' ],
	'talkpagename'              => [ '1', 'NOM_DE_LA_PÂGE_DE_DISCUSSION', 'NOMPAGEDISCUSSION', 'TALKPAGENAME' ],
	'talkpagenamee'             => [ '1', 'NOM_DE_LA_PÂGE_DE_DISCUSSION_URL', 'NOMPAGEDISCUSSIONX', 'TALKPAGENAMEE' ],
	'talkspace'                 => [ '1', 'ÈSPÂÇO_DE_DISCUSSION', 'ESPACEDISCUSSION', 'TALKSPACE' ],
	'talkspacee'                => [ '1', 'ÈSPÂÇO_DE_DISCUSSION_URL', 'ESPACEDISCUSSIONX', 'TALKSPACEE' ],
	'toc'                       => [ '0', '__SOMÈRO__', '__TRÂBLA__', '__SOMMAIRE__', '__TDM__', '__TOC__' ],
	'uc'                        => [ '0', 'GRANTA_LÈTRA:', 'MAJUS:', 'CAPIT:', 'UC:' ],
	'ucfirst'                   => [ '0', 'PREMIÉRE_GRANTA_LÈTRA:', 'INITMAJUS:', 'INITCAPIT:', 'UCFIRST:' ],
	'urlencode'                 => [ '0', 'URL_ENCODÂ:', 'ENCODEURL:', 'URLENCODE:' ],
	'url_path'                  => [ '0', 'CHEMIN', 'PATH' ],
	'url_wiki'                  => [ '0', 'VOUIQUI', 'WIKI' ],
];

$linkTrail = '/^([a-zàâçéèêîœôû·’æäåāăëēïīòöōùü‘]+)(.*)$/sDu';

$dateFormats = [
	'mdy time' => 'H:i',
	'mdy date' => 'F j, Y',
	'mdy both' => 'F j, Y "a" H:i',

	'dmy time' => 'H:i',
	'dmy date' => 'j F Y',
	'dmy both' => 'j F Y "a" H:i',

	'ymd time' => 'H:i',
	'ymd date' => 'Y F j',
	'ymd both' => 'Y F j "a" H:i',
];

$separatorTransformTable = [ ',' => "\u{00A0}", '.' => ',' ];
