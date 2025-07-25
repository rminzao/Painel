<?xml version="1.0" encoding="utf-8"?>
<root>
    <config>
        <BACKUP_FLASHSITE value="{{ $server->flash }}/" />
        <USE_MD5 value="true" />
        <FLASHSITE value="{{ $server->flash }}/" />
        <SITE value="{{ $server->resource }}/" />
        <FIRSTPAGE value="{{ url() }}/" />
        <REGISTER value="{{ url() }}/" />
        <REQUEST_PATH value="{{ $server->request }}/" />
        <LOGIN_PATH value="{{ url() }}/" />
        <FILL_PATH value="{{ url() }}/" />
        <POLICY_FILES>
            <file value="{{ url() }}/crossdomain.xml" />
        </POLICY_FILES>
        <ALLOW_MULTI value="true" />
        <FIGHTLIB value="true" />
        <TRAINER_PATH value="tutorial.swf" />
        <MUSIC_LIST
            value="1001,1002,1003,1004,1005,1006,1007,1008,1009,1010,1011,1012,1013,1014,1023,1024,1025,1026,1027,1028,1029,1030,1031,1032,1034,1035,1036,1037,1038,1039,1040,1059,1060,1061,1062,1063,1065,1067,1068,1069,1077" />
        <LANGUAGE value="portugal" />
        <PARTER_ID value="316" />
        <STATISTIC value="true" />
        <SUCIDE_TIME value="120" />
        <ISTOPDERIICT value="true" />
        <COUNT_PATH value="http://assayerhandler.7road.com/" />
        <PHP isShow="false" link="false" site="http://baidu.com/" infoPath="a.xml" />
        <OFFICIAL_SITE value="http://br.337.com/redirect.php?game=ddt" />
        <GAME_FORUM value="http://br.337.com/forum/viewforum.php?f=15" />
        <COMMUNITY_FRIEND_PATH isUser="false" value="http://ddt.the9.com/addfriend.php" />
        <COMMUNITY_INVITE_PATH value="http://ddt.the9.com/invite.php" />
        <COMMUNITY_FRIEND_LIST_PATH value="" isexist="false" />
        <COMMUNITY_FRIEND_INVITED_SWITCH value="false" invitedOnline="false" />
        <COMMUNITY_MICROBLOG value="false" />
        <EXTERNAL_INTERFACE enable="true" path="http://api.mmog.asia/partner/facebook/apps/lib/fb_boomz.php"
            key="cr64rAmUPratutUp" server="t1" />
        <USERS_IMPORT_ACTIVITIES path="http://assist49.myddt.com.br/SendMessage.ashx" enable="false" />
        <ALLOW_POPUP_FAVORITE value="true" />
        <FILL_JS_COMMAND value="showPayments" enable="true" />
        <SHIELD_NOTICE value="false" />
        <!-- 铁匠铺强化最高等级开关 -->
        <STHRENTH_MAX value="12" />
        <!-- 客服系统开关 -->
        <FEEDBACK enable="true" />
        <!--3.3之前的新版新手引导开关-->
        <USER_GUILD_ENABLE value="true" />
        <!--远征码头等级限制-->
        <MINLEVELDUPLICATE value="10" />
        <!-- 师徒副本开关 -->
        <TEACHER_PUPIL_FB enable="true" />
        <!-- 公会技能开关 -->
        <GUILD_SKILL enable="true" />
        <LEAGUE enable="true" />
        <!-- 开启温泉房间续费功能-->
        <HOTSPRING value="false" />
        <!-- 公会名称大于等于13字符颜色修改-->
        <CONSORTIA_NAME_CHANGECOLOR enable="true" color="0xFF0000" value="12" />
        <!-- 桌面收藏开关 -->
        <DAILY enable="true" />
        <CLIENT_DOWNLOAD value="http://www.goplayer.cc/public/games/ddt/DDTank.exe" />
        <!-- 修炼系统开关 -->
        <TEXPBTN value="true" />
        <!-- 工会使命系统开关 -->
        <PLACARD_TASKBTN value="true" />
        <!-- 工会图标开关 -->
        <BADGEBTN value="true" />
        <!--下载登录开关-->
        <DOWNLOAD value="true" />
        <!--- 梅恩兰德大陆祝福开关-->
        <!--- 幸运数字的开关-->
        <LUCKY_NUMBER enable="false" />
        <!--- 占卜的开关-->
        <LOTTERY enable="false" />
        <!-- 交友中心和结婚的开关-->
        <MODULE>
            <CIVIL enable="true" />
            <CHURCH enable="true" />
        </MODULE>
        <CHAT_FACE>
            <DISABLED_LIST list="38" />
        </CHAT_FACE>
        <GAME_FRAME_CONFIG>
            <!-- 每帧执行的毫秒数,正常值应为40毫秒,并允许在35至45毫秒之间波动  (游戏内正常帧速为 25帧/秒)-->
            <FRAME_TIME_OVER_TAG value="67" />
            <!-- 连续低于上述毫秒的帧数 (游戏内正常帧速为 25帧/秒) -->
            <FRAME_OVER_COUNT_TAG value="25" />
        </GAME_FRAME_CONFIG>
        <SHORTCUT enable="false" />
        <GAME_BOXPIC value="1" />
        <BUFF enable="true" />
        <LITTLEGAMEMINLV value="10" />
        <SHOW_BACKGROUND value="true" />
        <TRAINER_STANDALONE value="true" />
        <OVERSEAS>
            <OVERSEAS_COMMUNITY_TYPE value="1" callPath="" callJS="" />
        </OVERSEAS>
        <!--副本开关-->
        <DUNGEON_OPENLIST value="1,2,3,4,5,6,7,8,9,10,11,12,13" advancedEnable="true" epicLevelEnable="true"
            footballEnable="true" />
        <SHOPITEM_SUIT_TOSHOW enable="true" />
        <SUIT enable="true" />
        <!--弹王盟约开关-->
        <KINGBLESS enable="true" />
        <!--任务托管 -->
        <QUEST_TRUSTEESHIP enable="false" />
        <!--勇士秘境开关 -->
        <WARRIORS_FAM enable="true" />
        <!--战魂开关-->
        <GEMSTONE enable="true" />
        <!--337VIP按钮为空不显示跳转按钮-->
        <GOTO337 value="http://web.337.com/pt/activity/vipprize?id=19" />
        <ONEKEYDONE enable="true" />
        <!--邂逅开关-->
        <ENCOUNTER enable="false" />
        <!--农场探宝开关-->
        <TREASURE enable="false" time="5" />
        <!--活力值开关-->
        <ENERGY_ENABLE enable="fales" />
        <!--进阶开关-->
        <EXALTBTN enable="true" />
        <!--赛亚之神 临时属性-->
        <GODSYAH enable="true" />
        <PK_BTN enable="true" />
        <FIGHT_TIME count="2" />
        <PETS_EAT enable="true" />
    </config>
    <update>
        <version from="268" to="269">
            <file value="flash/2.png" />
            <file value="2.png" />
        </version>
        <version from="269" to="270">
            <file value="flash/2.png" />
            <file value="2.png" />
        </version>
        <version from="270" to="271">
            <file value="*" />
            <file value="flash/*" />
        </version>
    </update>
</root>
