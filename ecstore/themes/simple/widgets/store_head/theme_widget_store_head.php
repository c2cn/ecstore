<?php
function theme_widget_store_head(&$setting,&$smarty) {    
    $setting['store']=$smarty->pagedata['store'];
    //��Ա��¼
    $setting['isLogin']=isset($smarty->pagedata['member_info']['member_id']);
    //�ͷ�
    $setting['im_webcall']=$smarty->pagedata['im_webcall'];
    return $setting;
}