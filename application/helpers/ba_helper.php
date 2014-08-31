<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 *  Sayfadaki fonksiyonlar şunlara ihtiyaç duyar
 *  Helper: url
 */


# ID içindeki rakamları harflere dönüştür.

function genid_from_id($id) {
    $id = (int) $id;
    $ret = str_replace(array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0), array('b', 'f', 'm', 'n', 'r', 's', 't', 'x', 'z', 'a'), $id);

    /*
      foreach (str_split($str, 2) as $k) {
      $ret .= $k . '/';
      }
     */

    return $ret;
}

# GenID içindeki harfleri rakamlara dönüştür.

function id_from_genid($genid) {
    $genid = str_replace(array('b', 'f', 'm', 'n', 'r', 's', 't', 'x', 'z', 'a'), array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0), $genid);
    $ret = (int) $genid;

    return $ret;
}

# Kullanıcının görüntülenme izni var mı, kontrol eder.

function check_perm($id) {

	//Google "404" bulunamadı ya da 410 "yok/gitti" hatası döndürmeyi önerdi.
    if ($id < 1)
        show_error("Information Removed", "410", "Sorry for inconvenience");

    return;
    
    @include(FCPATH . 'reddedilenler.txt');
    if (@in_array($id, $reddedilenler))
        show_error("Information Removed", "410", "Sorry for inconvenience");
}

# Lokasyon getirir.

function get_lokasyon($key) {

    /*
      |--------------------------------------------------------------------------
      | Lokasyonlar
      |--------------------------------------------------------------------------
      |
      | Kişilerin Lokasyon bilgileri için değişken
      |
     */

    $lokasyon['sq_AL'] = 'Albanian (Albania)';
    $lokasyon['sq'] = 'Albanian';
    $lokasyon['ar_DZ'] = 'Arabic (Algeria)';
    $lokasyon['ar_BH'] = 'Arabic (Bahrain)';
    $lokasyon['ar_EG'] = 'Arabic (Egypt)';
    $lokasyon['ar_IQ'] = 'Arabic (Iraq)';
    $lokasyon['ar_JO'] = 'Arabic (Jordan)';
    $lokasyon['ar_KW'] = 'Arabic (Kuwait)';
    $lokasyon['ar_LB'] = 'Arabic (Lebanon)';
    $lokasyon['ar_LY'] = 'Arabic (Libya)';
    $lokasyon['ar_MA'] = 'Arabic (Morocco)';
    $lokasyon['ar_OM'] = 'Arabic (Oman)';
    $lokasyon['ar_QA'] = 'Arabic (Qatar)';
    $lokasyon['ar_SA'] = 'Arabic (Saudi Arabia)';
    $lokasyon['ar_SD'] = 'Arabic (Sudan)';
    $lokasyon['ar_SY'] = 'Arabic (Syria)';
    $lokasyon['ar_TN'] = 'Arabic (Tunisia)';
    $lokasyon['ar_AE'] = 'Arabic (United Arab Emirates)';
    $lokasyon['ar_YE'] = 'Arabic (Yemen)';
    $lokasyon['ar'] = 'Arabic';
    $lokasyon['be_BY'] = 'Belarusian (Belarus)';
    $lokasyon['be'] = 'Belarusian';
    $lokasyon['bg_BG'] = 'Bulgarian (Bulgaria)';
    $lokasyon['bg'] = 'Bulgarian';
    $lokasyon['ca_ES'] = 'Catalan (Spain)';
    $lokasyon['ca'] = 'Catalan';
    $lokasyon['zh_CN'] = 'Chinese (China)';
    $lokasyon['zh_HK'] = 'Chinese (Hong Kong)';
    $lokasyon['zh_SG'] = 'Chinese (Singapore)';
    $lokasyon['zh_TW'] = 'Chinese (Taiwan)';
    $lokasyon['zh'] = 'Chinese';
    $lokasyon['hr_HR'] = 'Croatian (Croatia)';
    $lokasyon['hr'] = 'Croatian';
    $lokasyon['cs_CZ'] = 'Czech (Czech Republic)';
    $lokasyon['cs'] = 'Czech';
    $lokasyon['da_DK'] = 'Danish (Denmark)';
    $lokasyon['da'] = 'Danish';
    $lokasyon['nl_BE'] = 'Dutch (Belgium)';
    $lokasyon['nl_NL'] = 'Dutch (Netherlands)';
    $lokasyon['nl'] = 'Dutch';
    $lokasyon['en_AU'] = 'English (Australia)';
    $lokasyon['en_CA'] = 'English (Canada)';
    $lokasyon['en_IN'] = 'English (India)';
    $lokasyon['en_IE'] = 'English (Ireland)';
    $lokasyon['en_MT'] = 'English (Malta)';
    $lokasyon['en_NZ'] = 'English (New Zealand)';
    $lokasyon['en_PH'] = 'English (Philippines)';
    $lokasyon['en_SG'] = 'English (Singapore)';
    $lokasyon['en_ZA'] = 'English (South Africa)';
    $lokasyon['en_GB'] = 'English (United Kingdom)';
    $lokasyon['en_US'] = 'English (United States)';
    $lokasyon['en'] = 'English';
    $lokasyon['et_EE'] = 'Estonian (Estonia)';
    $lokasyon['et'] = 'Estonian';
    $lokasyon['fi_FI'] = 'Finnish (Finland)';
    $lokasyon['fi'] = 'Finnish';
    $lokasyon['fr_BE'] = 'French (Belgium)';
    $lokasyon['fr_CA'] = 'French (Canada)';
    $lokasyon['fr_FR'] = 'French (France)';
    $lokasyon['fr_LU'] = 'French (Luxembourg)';
    $lokasyon['fr_CH'] = 'French (Switzerland)';
    $lokasyon['fr'] = 'French';
    $lokasyon['de_AT'] = 'German (Austria)';
    $lokasyon['de_DE'] = 'German (Germany)';
    $lokasyon['de_LU'] = 'German (Luxembourg)';
    $lokasyon['de_CH'] = 'German (Switzerland)';
    $lokasyon['de'] = 'German';
    $lokasyon['el_CY'] = 'Greek (Cyprus)';
    $lokasyon['el_GR'] = 'Greek (Greece)';
    $lokasyon['el'] = 'Greek';
    $lokasyon['iw_IL'] = 'Hebrew (Israel)';
    $lokasyon['iw'] = 'Hebrew';
    $lokasyon['hi_IN'] = 'Hindi (India)';
    $lokasyon['hu_HU'] = 'Hungarian (Hungary)';
    $lokasyon['hu'] = 'Hungarian';
    $lokasyon['is_IS'] = 'Icelandic (Iceland)';
    $lokasyon['is'] = 'Icelandic';
    $lokasyon['in_ID'] = 'Indonesian (Indonesia)';
    $lokasyon['in'] = 'Indonesian';
    $lokasyon['ga_IE'] = 'Irish (Ireland)';
    $lokasyon['ga'] = 'Irish';
    $lokasyon['it_IT'] = 'Italian (Italy)';
    $lokasyon['it_CH'] = 'Italian (Switzerland)';
    $lokasyon['it'] = 'Italian';
    $lokasyon['ja_JP'] = 'Japanese (Japan)';
    $lokasyon['ja_JP_JP'] = 'Japanese (Japan,JP)';
    $lokasyon['ja'] = 'Japanese';
    $lokasyon['ko_KR'] = 'Korean (South Korea)';
    $lokasyon['ko'] = 'Korean';
    $lokasyon['lv_LV'] = 'Latvian (Latvia)';
    $lokasyon['lv'] = 'Latvian';
    $lokasyon['lt_LT'] = 'Lithuanian (Lithuania)';
    $lokasyon['lt'] = 'Lithuanian';
    $lokasyon['mk_MK'] = 'Macedonian (Macedonia)';
    $lokasyon['mk'] = 'Macedonian';
    $lokasyon['ms_MY'] = 'Malay (Malaysia)';
    $lokasyon['ms'] = 'Malay';
    $lokasyon['mt_MT'] = 'Maltese (Malta)';
    $lokasyon['mt'] = 'Maltese';
    $lokasyon['no_NO'] = 'Norwegian (Norway)';
    $lokasyon['no_NO_NY'] = 'Norwegian (Norway,Nynorsk)';
    $lokasyon['no'] = 'Norwegian';
    $lokasyon['pl_PL'] = 'Polish (Poland)';
    $lokasyon['pl'] = 'Polish';
    $lokasyon['pt_BR'] = 'Portuguese (Brazil)';
    $lokasyon['pt_PT'] = 'Portuguese (Portugal)';
    $lokasyon['pt'] = 'Portuguese';
    $lokasyon['ro_RO'] = 'Romanian (Romania)';
    $lokasyon['ro'] = 'Romanian';
    $lokasyon['ru_RU'] = 'Russian (Russia)';
    $lokasyon['ru'] = 'Russian';
    $lokasyon['sr_BA'] = 'Serbian (Bosnia and Herzegovina)';
    $lokasyon['sr_ME'] = 'Serbian (Montenegro)';
    $lokasyon['sr_CS'] = 'Serbian (Serbia and Montenegro)';
    $lokasyon['sr_RS'] = 'Serbian (Serbia)';
    $lokasyon['sr'] = 'Serbian';
    $lokasyon['sk_SK'] = 'Slovak (Slovakia)';
    $lokasyon['sk'] = 'Slovak';
    $lokasyon['sl_SI'] = 'Slovenian (Slovenia)';
    $lokasyon['sl'] = 'Slovenian';
    $lokasyon['es_AR'] = 'Spanish (Argentina)';
    $lokasyon['es_BO'] = 'Spanish (Bolivia)';
    $lokasyon['es_CL'] = 'Spanish (Chile)';
    $lokasyon['es_CO'] = 'Spanish (Colombia)';
    $lokasyon['es_CR'] = 'Spanish (Costa Rica)';
    $lokasyon['es_DO'] = 'Spanish (Dominican Republic)';
    $lokasyon['es_EC'] = 'Spanish (Ecuador)';
    $lokasyon['es_SV'] = 'Spanish (El Salvador)';
    $lokasyon['es_GT'] = 'Spanish (Guatemala)';
    $lokasyon['es_HN'] = 'Spanish (Honduras)';
    $lokasyon['es_MX'] = 'Spanish (Mexico)';
    $lokasyon['es_NI'] = 'Spanish (Nicaragua)';
    $lokasyon['es_PA'] = 'Spanish (Panama)';
    $lokasyon['es_PY'] = 'Spanish (Paraguay)';
    $lokasyon['es_PE'] = 'Spanish (Peru)';
    $lokasyon['es_PR'] = 'Spanish (Puerto Rico)';
    $lokasyon['es_ES'] = 'Spanish (Spain)';
    $lokasyon['es_US'] = 'Spanish (United States)';
    $lokasyon['es_UY'] = 'Spanish (Uruguay)';
    $lokasyon['es_VE'] = 'Spanish (Venezuela)';
    $lokasyon['es'] = 'Spanish';
    $lokasyon['sv_SE'] = 'Swedish (Sweden)';
    $lokasyon['sv'] = 'Swedish';
    $lokasyon['th_TH'] = 'Thai (Thailand)';
    $lokasyon['th_TH_TH'] = 'Thai (Thailand,TH)';
    $lokasyon['th'] = 'Thai';
    $lokasyon['tr_TR'] = 'Turkish (Turkey)';
    $lokasyon['tr'] = 'Turkish';
    $lokasyon['uk_UA'] = 'Ukrainian (Ukraine)';
    $lokasyon['uk'] = 'Ukrainian';
    $lokasyon['vi_VN'] = 'Vietnamese (Vietnam)';
    $lokasyon['vi'] = 'Vietnamese';

    return (!array_key_exists($key, $lokasyon)) ? $key : $lokasyon[$key];
}

function stats_add($id = "1", $hane = "viewed", $puan = "1") {
    $ci = &get_instance();
    //$ci->load->database();
    $id = (int) $id;
    $puan = (int) $puan;
    $veri = $ci->db->select("primary")->where("id", $id)->from("liste")->limit("1")->get()->row();
    if (isset($veri->primary)) {
        //Durumu kontrol et
        $check_exist = $ci->db->select("primary")->where("id", $id)->from("stats")->limit("1")->get()->row();
        //Kaydı gir veya güncelle
        if (isset($check_exist->primary)) {
            $ci->db->set('viewed', "viewed+$puan", FALSE)->where("id", "$id")->from("stats")->limit("1")->update("stats");
        } else {
            $ci->db->set('viewed', "viewed+$puan", FALSE)->set("id", "$id")->from("stats")->limit("1")->insert("stats");
        }
        return TRUE;
    }
    return FALSE;
}
