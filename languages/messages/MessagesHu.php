<?php
/** Hungarian (magyar)
 *
 * @file
 * @ingroup Languages
 */

$namespaceNames = [
	NS_MEDIA            => 'Média',
	NS_SPECIAL          => 'Speciális',
	NS_TALK             => 'Vita',
	NS_USER             => 'Szerkesztő',
	NS_USER_TALK        => 'Szerkesztővita',
	NS_PROJECT_TALK     => '$1-vita',
	NS_FILE             => 'Fájl',
	NS_FILE_TALK        => 'Fájlvita',
	NS_MEDIAWIKI        => 'MediaWiki',
	NS_MEDIAWIKI_TALK   => 'MediaWiki-vita',
	NS_TEMPLATE         => 'Sablon',
	NS_TEMPLATE_TALK    => 'Sablonvita',
	NS_HELP             => 'Segítség',
	NS_HELP_TALK        => 'Segítségvita',
	NS_CATEGORY         => 'Kategória',
	NS_CATEGORY_TALK    => 'Kategóriavita',
];

$namespaceAliases = [
	'Kép' => NS_FILE,
	'Képvita' => NS_FILE_TALK,
	'User_vita'      => NS_USER_TALK,
	'$1_vita'        => NS_PROJECT_TALK,
	'Kép_vita'       => NS_FILE_TALK,
	'MediaWiki_vita' => NS_MEDIAWIKI_TALK,
	'Sablon_vita'    => NS_TEMPLATE_TALK,
	'Segítség_vita'  => NS_HELP_TALK,
	'Kategória_vita' => NS_CATEGORY_TALK,
];

$fallback8bitEncoding = "iso8859-2";
$separatorTransformTable = [ ',' => "\u{00A0}", '.' => ',' ];

/** @phpcs-require-sorted-array */
$specialPageAliases = [
	'Activeusers'               => [ 'Aktív_felhasználók', 'Aktív_szerkesztők' ],
	'Allmessages'               => [ 'Rendszerüzenetek' ],
	'Allpages'                  => [ 'Az_összes_lap_listája' ],
	'Ancientpages'              => [ 'Régóta_nem_változott_szócikkek' ],
	'Badtitle'                  => [ 'Hibás_címek' ],
	'Blankpage'                 => [ 'Üres_lap' ],
	'Block'                     => [ 'Blokkolás' ],
	'BlockList'                 => [ 'Blokkolt_IP-címek_listája' ],
	'Booksources'               => [ 'Könyvforrások' ],
	'BrokenRedirects'           => [ 'Nem_létező_lapra_mutató_átirányítások', 'Hibás_átirányítások' ],
	'Categories'                => [ 'Kategóriák' ],
	'ChangePassword'            => [ 'Jelszócsere' ],
	'ComparePages'              => [ 'Lapok_összehasonlítása' ],
	'Confirmemail'              => [ 'Emailcím_megerősítése' ],
	'Contributions'             => [ 'Szerkesztő_közreműködései' ],
	'CreateAccount'             => [ 'Szerkesztői_fiók_létrehozása', 'Felhasználói_fiók_létrehozása' ],
	'Deadendpages'              => [ 'Zsákutcalapok' ],
	'DeletedContributions'      => [ 'Törölt_szerkesztések' ],
	'DoubleRedirects'           => [ 'Kettős_átirányítások', 'Dupla_átirányítások' ],
	'EditWatchlist'             => [ 'Figyelőlista_szerkesztése' ],
	'Emailuser'                 => [ 'E-mail_küldése', 'E-mail_küldése_ezen_szerkesztőnek' ],
	'ExpandTemplates'           => [ 'Sablonok_kibontása' ],
	'Export'                    => [ 'Lapok_exportálása' ],
	'Fewestrevisions'           => [ 'Legkevesebbet_szerkesztett_lapok' ],
	'FileDuplicateSearch'       => [ 'Duplikátumok_keresése' ],
	'Filepath'                  => [ 'Fájl_elérési_útja', 'Fájl_elérési_út' ],
	'Import'                    => [ 'Lapok_importálása' ],
	'Interwiki'                 => [ 'Wikiközi_hivatkozások' ],
	'Invalidateemail'           => [ 'E-mail_cím_érvénytelenítése' ],
	'LinkSearch'                => [ 'Hivatkozás_keresés' ],
	'Listadmins'                => [ 'Adminisztrátorok', 'Adminisztrátorok_listája', 'Sysopok' ],
	'Listbots'                  => [ 'Botok', 'Botok_listája' ],
	'Listfiles'                 => [ 'Fájlok_listája', 'Képek_listája', 'Fájllista', 'Képlista' ],
	'Listgrouprights'           => [ 'Szerkesztői_csoportok_jogai' ],
	'Listredirects'             => [ 'Átirányítások_listája' ],
	'Listusers'                 => [ 'Szerkesztők_listája', 'Szerkesztők', 'Felhasználók' ],
	'Lockdb'                    => [ 'Adatbázis_lezárása' ],
	'Log'                       => [ 'Rendszernaplók', 'Naplók', 'Napló' ],
	'Lonelypages'               => [ 'Árva_lapok', 'Magányos_lapok' ],
	'Longpages'                 => [ 'Hosszú_lapok' ],
	'MergeHistory'              => [ 'Laptörténetek_egyesítése', 'Laptörténet-egyesítés' ],
	'MIMEsearch'                => [ 'Keresés_MIME-típus_alapján' ],
	'Mostcategories'            => [ 'Legtöbb_kategóriába_tartozó_lapok' ],
	'Mostimages'                => [ 'Legtöbbet_használt_fájlok', 'Legtöbbet_használt_képek' ],
	'Mostlinked'                => [ 'Legtöbbet_hivatkozott_lapok' ],
	'Mostlinkedcategories'      => [ 'Legtöbbet_hivatkozott_kategóriák' ],
	'Mostlinkedtemplates'       => [ 'Legtöbbet_hivatkozott_sablonok' ],
	'Mostrevisions'             => [ 'Legtöbbet_szerkesztett_lapok' ],
	'Movepage'                  => [ 'Lap_átnevezése' ],
	'Mycontributions'           => [ 'Közreműködéseim' ],
	'Mypage'                    => [ 'Lapom', 'Userlapom' ],
	'Mytalk'                    => [ 'Vitám', 'Vitalapom', 'Uservitalapom' ],
	'Myuploads'                 => [ 'Saját_feltöltéseim' ],
	'Newimages'                 => [ 'Új_fájlok', 'Új_képek', 'Új_képek_galériája' ],
	'Newpages'                  => [ 'Új_lapok' ],
	'PasswordReset'             => [ 'Jelszó_helyreállítása' ],
	'Preferences'               => [ 'Beállításaim' ],
	'Prefixindex'               => [ 'Keresés_előtag_szerint' ],
	'Protectedpages'            => [ 'Védett_lapok' ],
	'Protectedtitles'           => [ 'Védett_címek' ],
	'Randompage'                => [ 'Lap_találomra' ],
	'Randomredirect'            => [ 'Átirányítás_találomra' ],
	'Recentchanges'             => [ 'Friss_változtatások' ],
	'Recentchangeslinked'       => [ 'Kapcsolódó_változtatások' ],
	'Renameuser'                => [ 'Szerkesztő_átnevezése' ],
	'Revisiondelete'            => [ 'Változat_törlése' ],
	'Search'                    => [ 'Keresés' ],
	'Shortpages'                => [ 'Rövid_lapok' ],
	'Specialpages'              => [ 'Speciális_lapok' ],
	'Statistics'                => [ 'Statisztika', 'Statisztikák' ],
	'Tags'                      => [ 'Címkék' ],
	'Unblock'                   => [ 'Blokkolás_feloldása' ],
	'Uncategorizedcategories'   => [ 'Kategorizálatlan_kategóriák' ],
	'Uncategorizedimages'       => [ 'Kategorizálatlan_fájlok', 'Kategorizálatlan_képek' ],
	'Uncategorizedpages'        => [ 'Kategorizálatlan_lapok' ],
	'Uncategorizedtemplates'    => [ 'Kategorizálatlan_sablonok' ],
	'Undelete'                  => [ 'Törölt_lapváltozatok_visszaállítása' ],
	'Unlockdb'                  => [ 'Adatbázis_lezárás_feloldása' ],
	'Unusedcategories'          => [ 'Nem_használt_kategóriák' ],
	'Unusedimages'              => [ 'Nem_használt_képek' ],
	'Unusedtemplates'           => [ 'Nem_használt_sablonok' ],
	'Unwatchedpages'            => [ 'Nem_figyelt_lapok' ],
	'Upload'                    => [ 'Feltöltés' ],
	'Userlogin'                 => [ 'Belépés' ],
	'Userlogout'                => [ 'Kilépés' ],
	'Userrights'                => [ 'Szerkesztők_jogai', 'Szerkesztői_jogok', 'Szerkesztőjogok', 'Szerkesztő_jogai' ],
	'Version'                   => [ 'Névjegy', 'Verziószám', 'Verzió' ],
	'Wantedcategories'          => [ 'Keresett_kategóriák' ],
	'Wantedfiles'               => [ 'Keresett_fájlok' ],
	'Wantedpages'               => [ 'Keresett_lapok' ],
	'Wantedtemplates'           => [ 'Keresett_sablonok' ],
	'Watchlist'                 => [ 'Figyelőlistám' ],
	'Whatlinkshere'             => [ 'Mi_hivatkozik_erre' ],
	'Withoutinterwiki'          => [ 'Nyelvközi_hivatkozás_nélküli_lapok', 'Wikiközi_hivatkozás_nélküli_lapok', 'Interwikilinkek_nélküli_lapok' ],
];

$datePreferences = [
	'ymd',
	'ISO 8601',
];

$defaultDateFormat = 'ymd';

$dateFormats = [
	'ymd time' => 'H:i',
	'ymd date' => 'Y. F j.',
	'ymd both' => 'Y. F j., H:i',

	'ISO 8601 time' => 'xnH:xni:xns',
	'ISO 8601 date' => 'xnY-xnm-xnd',
	'ISO 8601 both' => 'xnY-xnm-xnd"T"xnH:xni:xns',
];

/** @phpcs-require-sorted-array */
$magicWords = [
	'anchorencode'              => [ '0', 'HORGONYKÓDOLVA', 'ANCHORENCODE' ],
	'basepagename'              => [ '1', 'ALAPLAPNEVE', 'BASEPAGENAME' ],
	'basepagenamee'             => [ '1', 'ALAPLAPNEVEE', 'BASEPAGENAMEE' ],
	'contentlanguage'           => [ '1', 'TARTALOMNYELVE', 'TARTNYELVE', 'CONTENTLANGUAGE', 'CONTENTLANG' ],
	'currentday'                => [ '1', 'MAINAP', 'CURRENTDAY' ],
	'currentday2'               => [ '1', 'MAINAP2', 'CURRENTDAY2' ],
	'currentdayname'            => [ '1', 'MAINAPNEVE', 'CURRENTDAYNAME' ],
	'currentdow'                => [ '1', 'HÉTNAPJA', 'CURRENTDOW' ],
	'currenthour'               => [ '1', 'ÓRA', 'CURRENTHOUR' ],
	'currentmonth'              => [ '1', 'HÓNAP', 'CURRENTMONTH', 'CURRENTMONTH2' ],
	'currentmonth1'             => [ '1', 'HÓNAP1', 'CURRENTMONTH1' ],
	'currentmonthabbrev'        => [ '1', 'HÓNAPRÖVID', 'CURRENTMONTHABBREV' ],
	'currentmonthname'          => [ '1', 'HÓNAPNEVE', 'CURRENTMONTHNAME' ],
	'currenttime'               => [ '1', 'IDŐ', 'CURRENTTIME' ],
	'currenttimestamp'          => [ '1', 'IDŐBÉLYEG', 'CURRENTTIMESTAMP' ],
	'currentversion'            => [ '1', 'JELENLEGIVÁLTOZAT', 'CURRENTVERSION' ],
	'currentweek'               => [ '1', 'HÉT', 'CURRENTWEEK' ],
	'currentyear'               => [ '1', 'ÉV', 'CURRENTYEAR' ],
	'defaultsort'               => [ '1', 'RENDEZÉS:', 'KULCS:', 'DEFAULTSORT:', 'DEFAULTSORTKEY:', 'DEFAULTCATEGORYSORT:' ],
	'directionmark'             => [ '1', 'IRÁNYJELZŐ', 'DIRECTIONMARK', 'DIRMARK' ],
	'displaytitle'              => [ '1', 'MEGJELENÍTENDŐCÍM', 'CÍM', 'DISPLAYTITLE' ],
	'filepath'                  => [ '0', 'ELÉRÉSIÚT:', 'FILEPATH:' ],
	'forcetoc'                  => [ '0', '__LEGYENTARTALOMJEGYZÉK__', '__LEGYENTJ__', '__FORCETOC__' ],
	'formatdate'                => [ '0', 'dátumformázás', 'formatdate', 'dateformat' ],
	'formatnum'                 => [ '0', 'FORMÁZOTTSZÁM', 'SZÁMFORMÁZÁS', 'SZÁMFORM', 'FORMATNUM' ],
	'fullpagename'              => [ '1', 'LAPTELJESNEVE', 'FULLPAGENAME' ],
	'fullpagenamee'             => [ '1', 'LAPTELJESNEVEE', 'FULLPAGENAMEE' ],
	'fullurl'                   => [ '0', 'TELJESURL:', 'FULLURL:' ],
	'fullurle'                  => [ '0', 'TELJESURLE:', 'FULLURLE:' ],
	'grammar'                   => [ '0', 'NYELVTAN:', 'GRAMMAR:' ],
	'hiddencat'                 => [ '1', '__REJTETTKAT__', '__REJTETTKATEGÓRIA__', '__HIDDENCAT__' ],
	'img_baseline'              => [ '1', 'alapvonal', 'baseline' ],
	'img_border'                => [ '1', 'keret', 'border' ],
	'img_bottom'                => [ '1', 'lent', 'lenn', 'bottom' ],
	'img_center'                => [ '1', 'középre', 'közép', 'center', 'centre' ],
	'img_framed'                => [ '1', 'keretezett', 'keretben', 'keretes', 'kerettel', 'frame', 'framed', 'enframed' ],
	'img_frameless'             => [ '1', 'keretnélküli', 'frameless' ],
	'img_left'                  => [ '1', 'balra', 'bal', 'left' ],
	'img_manualthumb'           => [ '1', 'bélyegkép=$1', 'bélyeg=$1', 'miniatűr=$1', 'thumbnail=$1', 'thumb=$1' ],
	'img_middle'                => [ '1', 'vközépen', 'vközépre', 'middle' ],
	'img_none'                  => [ '1', 'semmi', 'none' ],
	'img_page'                  => [ '1', 'oldal=$1', 'oldal $1', 'page=$1', 'page $1' ],
	'img_right'                 => [ '1', 'jobbra', 'jobb', 'right' ],
	'img_sub'                   => [ '1', 'ai', 'alsóindex', 'sub' ],
	'img_super'                 => [ '1', 'fi', 'felsőindex', 'super', 'sup' ],
	'img_text_bottom'           => [ '1', 'szöveg-lenn', 'szöveg-lent', 'text-bottom' ],
	'img_text_top'              => [ '1', 'szöveg-fenn', 'szöveg-fent', 'text-top' ],
	'img_thumbnail'             => [ '1', 'bélyegkép', 'bélyeg', 'miniatűr', 'thumb', 'thumbnail' ],
	'img_top'                   => [ '1', 'fenn', 'fent', 'top' ],
	'img_upright'               => [ '1', 'fennjobbra', 'fennjobbra=$1', 'fennjobbra $1', 'upright', 'upright=$1', 'upright $1' ],
	'language'                  => [ '0', '#NYELV', '#LANGUAGE' ],
	'lc'                        => [ '0', 'KISBETŰ:', 'KISBETŰK:', 'KB:', 'KISBETŰS:', 'LC:' ],
	'lcfirst'                   => [ '0', 'KISKEZDŐ:', 'KISKEZDŐBETŰ:', 'LCFIRST:' ],
	'localday'                  => [ '1', 'HELYINAP', 'LOCALDAY' ],
	'localday2'                 => [ '1', 'HELYINAP2', 'LOCALDAY2' ],
	'localdayname'              => [ '1', 'HELYINAPNEVE', 'LOCALDAYNAME' ],
	'localdow'                  => [ '1', 'HELYIHÉTNAPJA', 'LOCALDOW' ],
	'localhour'                 => [ '1', 'HELYIÓRA', 'LOCALHOUR' ],
	'localmonth'                => [ '1', 'HELYIHÓNAP', 'LOCALMONTH', 'LOCALMONTH2' ],
	'localmonth1'               => [ '1', 'HELYIHÓNAP1', 'LOCALMONTH1' ],
	'localmonthabbrev'          => [ '1', 'HELYIHÓNAPRÖVIDÍTÉS', 'LOCALMONTHABBREV' ],
	'localmonthname'            => [ '1', 'HELYIHÓNAPNÉV', 'LOCALMONTHNAME' ],
	'localtime'                 => [ '1', 'HELYIIDŐ', 'LOCALTIME' ],
	'localtimestamp'            => [ '1', 'HELYIIDŐBÉLYEG', 'LOCALTIMESTAMP' ],
	'localurl'                  => [ '0', 'HELYIURL:', 'LOCALURL:' ],
	'localurle'                 => [ '0', 'HELYIURLE:', 'LOCALURLE:' ],
	'localweek'                 => [ '1', 'HELYIHÉT', 'LOCALWEEK' ],
	'localyear'                 => [ '1', 'HELYIÉV', 'LOCALYEAR' ],
	'msg'                       => [ '0', 'ÜZENET:', 'ÜZ:', 'MSG:' ],
	'namespace'                 => [ '1', 'NÉVTERE', 'NAMESPACE' ],
	'namespacee'                => [ '1', 'NÉVTEREE', 'NAMESPACEE' ],
	'newsectionlink'            => [ '1', '__ÚJSZAKASZHIV__', '__ÚJSZAKASZLINK__', '__NEWSECTIONLINK__' ],
	'noeditsection'             => [ '0', '__NINCSSZERKESZTÉS__', '__NINCSSZERK__', '__NOEDITSECTION__' ],
	'nogallery'                 => [ '0', '__NINCSGALÉRIA__', '__NOGALLERY__' ],
	'noindex'                   => [ '1', '__NINCSINDEX__', '__NOINDEX__' ],
	'nonewsectionlink'          => [ '1', '__NINCSÚJSZAKASZHIV__', '__NINCSÚJSZAKASZLINK__', '__NONEWSECTIONLINK__' ],
	'notoc'                     => [ '0', '__NINCSTARTALOMJEGYZÉK__', '__NINCSTJ__', '__NOTOC__' ],
	'ns'                        => [ '0', 'NÉVTÉR:', 'NS:' ],
	'numberingroup'             => [ '1', 'CSOPORTTAGOK', 'NUMBERINGROUP', 'NUMINGROUP' ],
	'numberofactiveusers'       => [ '1', 'AKTÍVSZERKESZTŐKSZÁMA', 'NUMBEROFACTIVEUSERS' ],
	'numberofadmins'            => [ '1', 'ADMINOKSZÁMA', 'NUMBEROFADMINS' ],
	'numberofarticles'          => [ '1', 'SZÓCIKKEKSZÁMA', 'NUMBEROFARTICLES' ],
	'numberofedits'             => [ '1', 'SZERKESZTÉSEKSZÁMA', 'NUMBEROFEDITS' ],
	'numberoffiles'             => [ '1', 'FÁJLOKSZÁMA', 'KÉPEKSZÁMA', 'NUMBEROFFILES' ],
	'numberofpages'             => [ '1', 'OLDALAKSZÁMA', 'LAPOKSZÁMA', 'NUMBEROFPAGES' ],
	'numberofusers'             => [ '1', 'SZERKESZTŐKSZÁMA', 'NUMBEROFUSERS' ],
	'pagename'                  => [ '1', 'OLDALNEVE', 'PAGENAME' ],
	'pagenamee'                 => [ '1', 'OLDALNEVEE', 'PAGENAMEE' ],
	'pagesincategory'           => [ '1', 'LAPOKAKATEGÓRIÁBAN', 'PAGESINCATEGORY', 'PAGESINCAT' ],
	'pagesinnamespace'          => [ '1', 'OLDALAKNÉVTÉRBEN:', 'OLDALAKNBEN:', 'PAGESINNAMESPACE:', 'PAGESINNS:' ],
	'pagesize'                  => [ '1', 'LAPMÉRET', 'PAGESIZE' ],
	'plural'                    => [ '0', 'TÖBBESSZÁM:', 'PLURAL:' ],
	'protectionlevel'           => [ '1', 'VÉDELMISZINT', 'PROTECTIONLEVEL' ],
	'redirect'                  => [ '0', '#ÁTIRÁNYÍTÁS', '#REDIRECT' ],
	'revisionday'               => [ '1', 'VÁLTOZATNAPJA', 'REVISIONDAY' ],
	'revisionday2'              => [ '1', 'VÁLTOZATNAPJA2', 'REVISIONDAY2' ],
	'revisionid'                => [ '1', 'VÁLTOZATAZON', 'VÁLTOZATAZONOSÍTÓ', 'REVISIONID' ],
	'revisionmonth'             => [ '1', 'VÁLTOZATHÓNAPJA', 'REVISIONMONTH' ],
	'revisiontimestamp'         => [ '1', 'VÁLTOZATIDŐBÉLYEG', 'VÁLTOZATIDEJE', 'REVISIONTIMESTAMP' ],
	'revisionuser'              => [ '1', 'VÁLTOZATSZERKESZTŐJE', 'REVISIONUSER' ],
	'revisionyear'              => [ '1', 'VÁLTOZATÉVE', 'REVISIONYEAR' ],
	'server'                    => [ '0', 'SZERVER', 'KISZOLGÁLÓ', 'SERVER' ],
	'servername'                => [ '0', 'SZERVERNEVE', 'KISZOLGÁLÓNEVE', 'SERVERNAME' ],
	'sitename'                  => [ '1', 'WIKINEVE', 'SITENAME' ],
	'special'                   => [ '0', 'speciális', 'special' ],
	'staticredirect'            => [ '1', '__ÁLLANDÓÁTIRÁNYÍTÁS__', '__STATIKUSÁTIRÁNYÍTÁS__', '__STATICREDIRECT__' ],
	'subjectpagename'           => [ '1', 'SZÓCIKKNEVE', 'SUBJECTPAGENAME', 'ARTICLEPAGENAME' ],
	'subjectpagenamee'          => [ '1', 'SZÓCIKKNEVEE', 'SUBJECTPAGENAMEE', 'ARTICLEPAGENAMEE' ],
	'subjectspace'              => [ '1', 'SZÓCIKKNÉVTERE', 'SUBJECTSPACE', 'ARTICLESPACE' ],
	'subjectspacee'             => [ '1', 'SZÓCIKKNÉVTEREE', 'SUBJECTSPACEE', 'ARTICLESPACEE' ],
	'subpagename'               => [ '1', 'ALLAPNEVE', 'SUBPAGENAME' ],
	'subpagenamee'              => [ '1', 'ALLAPNEVEE', 'SUBPAGENAMEE' ],
	'subst'                     => [ '0', 'BEILLESZT:', 'BEMÁSOL:', 'SUBST:' ],
	'talkpagename'              => [ '1', 'VITALAPNEVE', 'TALKPAGENAME' ],
	'talkpagenamee'             => [ '1', 'VITALAPNEVEE', 'TALKPAGENAMEE' ],
	'talkspace'                 => [ '1', 'VITATERE', 'TALKSPACE' ],
	'talkspacee'                => [ '1', 'VITATEREE', 'TALKSPACEE' ],
	'toc'                       => [ '0', '__TARTALOMJEGYZÉK__', '__TJ__', '__TOC__' ],
	'uc'                        => [ '0', 'NAGYBETŰ:', 'NAGYBETŰK', 'NB:', 'NAGYBETŰS:', 'UC:' ],
	'ucfirst'                   => [ '0', 'NAGYKEZDŐ:', 'NAGYKEZDŐBETŰ:', 'UCFIRST:' ],
	'urlencode'                 => [ '0', 'URLKÓDOLVA:', 'URLENCODE:' ],
];

$linkTrail = '/^([a-záéíóúöüőűÁÉÍÓÚÖÜŐŰ]+)(.*)$/sDu';
