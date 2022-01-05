<?php if (!defined('ABSPATH')) {die;} // Cannot access directly.


$prefix_post_opts_style = 'style-postmeta-box';
CSF::createMetabox($prefix_post_opts_style, array(
    'title'     => '<span class="badge badge-radius badge-primary"><i class="fa fa-codiepie"></i> RIPRO</span> 文章内容布局',
    'post_type' => 'post',
    'data_type' => 'unserialize',
    'context' => 'side',
));
CSF::createSection($prefix_post_opts_style, array(
    'fields' => array(

        array(
            'id'      => 'post_style',
            'type'    => 'radio',
            'title'   => '',
            'inline'  => true,
            'options' => array(
                'sidebar'    => '内容+侧边栏',
                'no_sidebar' => '全宽',
            ),
            'default' => 'sidebar',
        ),
    ),
));


if (!_cao('close_site_shop','0')) {
    $prefix_post_opts = '_cao_post_options';
    CSF::createMetabox($prefix_post_opts, array(
        'title'     => '<span class="badge badge-radius badge-primary"><i class="fa fa-codiepie"></i> RIPRO</span> 付费资源信息设置',
        'post_type' => 'post',
        'data_type' => 'unserialize',
        'priority'  => 'high',
    ));

    CSF::createSection($prefix_post_opts, array(
        'fields' => array(
            

            array(
                'id'      => 'cao_price',
                'type'    => 'text',
                'title'   => '资源价格：*' . _cao('site_money_ua'),
                'default' => _cao('cao_price','0'),
                'desc'    => '免费请填写：0',
                'attributes' => array(
                    'style'    => 'width: 100px;'
                ),
            ),
            array(
                'id'      => 'cao_vip_rate',
                'type'    => 'text',
                'title'   => _cao('site_vip_name') . '会员折扣：*',
                'default' => _cao('cao_vip_rate','1'),
                'desc'    => '0.N 等于N折；1 等于不打折；0 等于免费',
                'attributes' => array(
                    'style'    => 'width: 100px;'
                ),
            ),
            array(
                'id'      => 'cao_expire_day',
                'type'    => 'text',
                'title'   => '购买有效期天数',
                'default' => '0',
                'desc'    => '0 无限期；N天后失效需要重新购买',
                'attributes' => array(
                    'style'    => 'width: 100px;'
                ),
            ),
            array(
                'id'    => 'cao_close_novip_pay',
                'type'  => 'checkbox',
                'title' => '普通用户禁止购买',
                'default' => _cao('cao_close_novip_pay',false),
                'label' => '勾选后普通用户不能下单支付，只允许会员可以购买',
            ),
            array(
                'id'    => 'cao_is_boosvip',
                'type'  => 'checkbox',
                'title' => '永久'._cao('site_vip_name').'会员免费',
                'label' => '勾选后永久'._cao('site_vip_name').'会员免费，其他会员按折扣或者原价购买',
                'default' => _cao('cao_is_boosvip',false),
            ),


            array(
                'id'    => 'cao_status',
                'type'  => 'switcher',
                'title' => '启用付费下载模块',
                'label' => '开启后可设置付费下载专有内容',
                'default' => _cao('cao_status',true),
            ),

            array(
                'id'         => 'cao_downurl',
                'type'       => 'upload',
                'title'      => '资源下载地址：',
                'desc'       => '可直接粘贴：支持https:,thunder:,magnet:,ed2k 开头地址，可本地上传',
                'default' => _cao('cao_downurl',''),
                'sanitize' => false,
                'dependency' => array('cao_status', '==', 'true'),
            ),
            array(
                'id'         => 'cao_downurl_bak',
                'type'       => 'upload',
                'title'      => '备用资源地址：',
                'desc'       => '该地址方便站长记录备用资源地址，注意此地址不在前端展示',
                'default' => _cao('cao_downurl_bak',''),
                'sanitize' => false,
                'dependency' => array('cao_status', '==', 'true'),
            ),
            array(
                'id'         => 'cao_diy_btn',
                'type'       => 'text',
                'title'      => '自定义按钮(NEW)',
                'subtitle'   => '为空则不显示，用 | 隔开',
                'desc'       => '格式： 下载免费版|https://www.baidu.com/',
                'default' => _cao('cao_diy_btn',''),
                'dependency' => array('cao_status', '==', 'true'),
            ),
            array(
                'id'         => 'cao_pwd',
                'type'       => 'text',
                'title'      => '文件密码',
                'label'       => '不填写则无需密码',
                'default' => _cao('cao_pwd',''),
                'sanitize' => false,
                'attributes' => array( 'style' => 'width: 100px;' ),
                'dependency' => array('cao_status', '==', 'true'),
            ),
            array(
                'id'         => 'cao_demourl',
                'type'       => 'text',
                'title'      => '演示地址',
                'label'   => '为空则不显示',
                'default' => _cao('cao_demourl',''),
                'dependency' => array('cao_status', '==', 'true'),
            ),
            array(
                'id'         => 'cao_info',
                'type'       => 'repeater',
                'title'      => '资源其他信息属性',
                'dependency' => array('cao_status', '==', 'true'),
                'fields'     => array(
                    array(
                        'id'      => 'title',
                        'type'    => 'text',
                        'title'   => '标题',
                        'default' => '标题',
                    ),
                    array(
                        'id'      => 'desc',
                        'type'    => 'text',
                        'title'   => '描述内容',
                        'default' => '这里是描述内容',
                    ),
                ),
                'default' =>  _cao('cao_info',array()),
            ),
            
            array(
                'id'      => 'cao_paynum',
                'type'    => 'text',
                'title'   => '已售数量',
                'default' => '0',
                'label'   => '可自定义修改数字',
                'attributes' => array(
                    'style'    => 'width: 100px;'
                ),
                'default' =>  _cao('cao_paynum','0'),
            ),

        ),
    ));
}


$prefix_post_opts_video = 'video-postmeta-box';
CSF::createMetabox($prefix_post_opts_video, array(
    'title'     => '<span class="badge badge-radius badge-primary"><i class="fa fa-codiepie"></i> RIPRO</span> 付费视频模块',
    'post_type' => 'post',
    'data_type' => 'unserialize',
    // 'context' => 'side',
));
CSF::createSection($prefix_post_opts_video, array(
    'fields' => array(
        array(
            'id'    => 'cao_video',
            'type'  => 'switcher',
            'title' => '启用视频模块',
            'label' => '',
        ),
        array(
            'id'    => 'cao_is_video_free',
            'type'  => 'checkbox',
            'title' => '免费视频',
            'label' => '勾选后该视频不参与任何付费逻辑，可直接展示播放',
            'default' => false,
            'dependency' => array('cao_video', '==', 'true'),
        ),
        array(
            'id'         => 'video_poster_url',
            'type'       => 'upload',
            'title'      => '视频封面图',
            'desc'       => '不设置则自动获取文章缩略图',
            'dependency' => array('cao_video', '==', 'true'),
        ),
        array(
            'id'         => 'video_url',
            'type'       => 'upload',
            'title'      => '视频播放地址',
            'desc'       => '支持mp4,m3u8(HLS格式)自动识别，支持本地上传和外链地址，不支其他平台视频解析',
            'dependency' => array('cao_video', '==', 'true'),
        ),

    ),
));


if (_cao('is_custom_post_meta_opt', '0') && _cao('custom_post_meta_opt', '0')) {
    //获取玩家配置
    $prefix_post_opts = '_custom_post_opts';
    CSF::createMetabox($prefix_post_opts, array(
        'title'     => '高级自定义文章属性',
        'post_type' => 'post',
        'data_type' => 'unserialize',
        'context'   => 'side',
    ));

    $custom_post_meta_opt = _cao('custom_post_meta_opt', '0');
    $fields_item          = array();
    foreach ($custom_post_meta_opt as $k => $v) {
        $opt = array('all' => '默认');
        foreach ($v['meta_opt'] as $value) {
            $_key       = $value['opt_ua'];
            $opt[$_key] = $value['opt_name'];
        }
        $item = array(
            'id'      => $v['meta_ua'],
            'type'    => 'select',
            'title'   => $v['meta_name'],
            'options' => $opt,
            'default' => 'option-2',
        );
        array_push($fields_item, $item);
    }
    CSF::createSection($prefix_post_opts, array(
        'fields' => $fields_item,
    ));
}



// prefix_page_opts
$prefix_page_opts = '_cao_page_options';

CSF::createMetabox($prefix_page_opts, array(
    'title'     => '页面布局',
    'post_type' => 'page',
    'data_type' => 'unserialize',
    'priority'  => 'high',
));

CSF::createSection($prefix_page_opts, array(
    'fields' => array(
        array(
            'id'      => 'post_style',
            'type'    => 'image_select',
            'title'   => '文章页布局风格',
            'options' => array(
                'sidebar'    => get_template_directory_uri() . '/assets/images/option/sidebar.jpg',
                'no_sidebar' => get_template_directory_uri() . '/assets/images/option/no-sidebar.jpg',
            ),
            'default' => 'sidebar',
        ),

    ),
));

if (!_cao('del_ripro_seo','0')) {
   $prefix_post_opts_seo = 'seo-postmeta-box';
    CSF::createMetabox($prefix_post_opts_seo, array(
        'title'     => '自定义文章SEO信息',
        'post_type' => 'post',
        'data_type' => 'unserialize',
    ));
    CSF::createSection($prefix_post_opts_seo, array(
        'fields' => array(

            array(
                'id'      => 'post_titie_s',
                'type'    => 'switcher',
                'title'   => '自定义SEO标题',
                'label'   => '不设置则自动根据WP规则显示',
                'default' => false,
            ),
            array(
                'id'         => 'post_titie',
                'type'       => 'text',
                'title'      => 'SEO标题',
                'subtitle'   => '',
                'dependency' => array('post_titie_s', '==', 'true'),
            ),
            array(
                'id'      => 'post_description_s',
                'type'    => 'switcher',
                'title'   => '自定义SEO描述',
                'label'   => '不设置则自动根据分类，标签抓取',
                'default' => false,
            ),
            array(
                'id'         => 'description',
                'type'       => 'textarea',
                'title'      => '描述内容',
                'subtitle'   => '字数控制到80-150最佳',
                'dependency' => array('post_description_s', '==', 'true'),
            ),

            array(
                'id'      => 'post_keywords_s',
                'type'    => 'switcher',
                'title'   => '自定义SEO关键词',
                'label'   => '不设置则自动根据分类，标签抓取',
                'default' => false,
            ),
            array(
                'id'         => 'keywords',
                'type'       => 'textarea',
                'title'      => '关键词',
                'subtitle'   => '关键词用英文逗号,隔开',
                'dependency' => array('post_keywords_s', '==', 'true'),
            ),

        ),
    ));
 
}
