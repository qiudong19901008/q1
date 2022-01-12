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
  Options::Q1_OPTION_PAGE_THEME_INTRO_DESCRIPTION => ' Q1主题, 体积小, 速度快, 设置简单, 是一款小巧的wordpress主题',
  Options::Q1_OPTION_PAGE_THEME_INTRO_THEME_VERSION => '最新版本：1.0',
  Options::Q1_OPTION_PAGE_THEME_INTRO_BUTTON_GROUP => [
    [
      Options::Q1_OPTION_PAGE_THEME_INTRO_BUTTION_LINK => '#',
      Options::Q1_OPTION_PAGE_THEME_INTRO_BUTTION_TEXT => '下载主题'
    ],
    [
      Options::Q1_OPTION_PAGE_THEME_INTRO_BUTTION_LINK => '#',
      Options::Q1_OPTION_PAGE_THEME_INTRO_BUTTION_TEXT => '主题教程'
    ]
  ],
  Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_GROUP_TITLE =>'主题功能',
  Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_GROUP => [
    [
      Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_TITLE => '现代化外观界面',
      Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_DESCRIPTION => '作者手写前端代码，不依赖界面库，设计现代化，符合当前用户审美，清爽简约。 ',
      Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_IMAGE => 'https://www.lovestu.com/wp-content/plugins/corepress-info/static/img/corepress/corepress_01.webp'
    ],
    [
      Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_TITLE => '现代化外观界面',
      Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_DESCRIPTION => '作者手写前端代码，不依赖界面库，设计现代化，符合当前用户审美，清爽简约。 ',
      Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_IMAGE => 'https://www.lovestu.com/wp-content/plugins/corepress-info/static/img/corepress/corepress_01.webp'
    ],
    [
      Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_TITLE => '现代化外观界面',
      Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_DESCRIPTION => '作者手写前端代码，不依赖界面库，设计现代化，符合当前用户审美，清爽简约。 ',
      Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_IMAGE => 'https://www.lovestu.com/wp-content/plugins/corepress-info/static/img/corepress/corepress_01.webp'
    ],
  ],
];