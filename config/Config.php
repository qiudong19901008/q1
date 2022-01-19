<?php

namespace q1\config;

use q1\constant\Options;

const TOKEN_SALT = 'SDFSdfjskdg';

// 60*60*24*7 
const TOKEN_EXPIRE_SECONDS = 60*60*24*7;

const DEFAULT_THEME_INTRO_DATA = [
  Options::Q1_OPTION_PAGE_THEME_INTRO_SEO_TITLE => 'q1主题',
  Options::Q1_OPTION_PAGE_THEME_INTRO_SEO_DESCRIPTION => 'q1主题是一款简洁的博客主题',
  Options::Q1_OPTION_PAGE_THEME_INTRO_SEO_KEYWORDS => 'q1主题,博客主题',
  Options::Q1_OPTION_PAGE_THEME_INTRO_HEAD_IMAGE => 'https://wpp.w2fenx.com/hedaoshe-theme/theme-banner.jpg',
  Options::Q1_OPTION_PAGE_THEME_INTRO_TITLE => 'Q1主题',
  Options::Q1_OPTION_PAGE_THEME_INTRO_DESCRIPTION => ' Q1主题, 体积小, 速度快, 设置简单, 是一款小巧符合seo的wordpress博客主题',
  Options::Q1_OPTION_PAGE_THEME_INTRO_THEME_VERSION => '最新版本：1.0.0',
  Options::Q1_OPTION_PAGE_THEME_INTRO_BUTTON_GROUP => [
    [
      Options::Q1_OPTION_PAGE_THEME_INTRO_BUTTION_LINK => '#',
      Options::Q1_OPTION_PAGE_THEME_INTRO_BUTTION_TEXT => '主题下载'
    ],
    [
      Options::Q1_OPTION_PAGE_THEME_INTRO_BUTTION_LINK => '#',
      Options::Q1_OPTION_PAGE_THEME_INTRO_BUTTION_TEXT => '主题教程'
    ],
    [
      Options::Q1_OPTION_PAGE_THEME_INTRO_BUTTION_LINK => 'https://w2fenx.com',
      Options::Q1_OPTION_PAGE_THEME_INTRO_BUTTION_TEXT => '主题演示'
    ],
    [
      Options::Q1_OPTION_PAGE_THEME_INTRO_BUTTION_LINK => 'https://github.com/qiudong19901008/q1/issues',
      Options::Q1_OPTION_PAGE_THEME_INTRO_BUTTION_TEXT => '问题反馈'
    ],
  ],
  Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_GROUP_TITLE =>'主题功能',
  Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_GROUP => [
    [
      Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_TITLE => '加载速度快',
      Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_DESCRIPTION => '手写前端代码, 不依赖界面库, 不需要过多加载第三方类库, 加载速度快',
      Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_IMAGE => 'https://wpp.w2fenx.com/w2fenx/rocket-g1b6e6e2c8_640-2022-01-12-15-13-05.png'
    ],
    [
      Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_TITLE => '完全符合seo',
      Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_DESCRIPTION => '根据seo原则设计的主题, 符合搜索引擎seo优化',
      Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_IMAGE => 'https://wpp.w2fenx.com/w2fenx/seo-img1-2022-01-12-15-21-03.png'
    ],
    [
      Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_TITLE => '设置简单',
      Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_DESCRIPTION => '没有过多复杂的功能, 设置上非常简单, 便于上手',
      Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_IMAGE => 'https://wpp.w2fenx.com/w2fenx/setting-2022-01-12-15-23-11.png'
    ],
    [
      Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_TITLE => '持续维护',
      Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_DESCRIPTION => '本人御用博客主题, 将持续维护更新',
      Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_IMAGE => 'https://wpp.w2fenx.com/w2fenx/doraemon-2022-01-12-15-32-11.jpg'
    ],
  ],
];