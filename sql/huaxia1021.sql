-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 10 月 21 日 10:43
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `huaxia`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `uname`, `pwd`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `adv`
--

CREATE TABLE IF NOT EXISTS `adv` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `picture` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `adv`
--

INSERT INTO `adv` (`id`, `name`, `keywords`, `picture`, `link`) VALUES
(1, '1', '茅台', '/images/adv1.jpg', '#'),
(2, '2', '广告', '/images/adv14.jpg ', '#'),
(4, '3', '轮播', '/images/adv15.jpg', '#'),
(5, '4', '降价', '/images/adv16.jpg', '#');

-- --------------------------------------------------------

--
-- 表的结构 `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `description` text,
  `old_price` float DEFAULT '0',
  `picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`id`, `goods_name`, `type`, `price`, `description`, `old_price`, `picture`) VALUES
(1, '40°英国百龄特醇苏格兰威士忌', '1', 650, '真品行货，品质保证', 750, '/images/g1.jpg'),
(11, '40°英国尊尼获加黑方（醇黑）', '2', 980, '馥郁浓烈，烟熏风味，深受大众喜爱的调配苏格兰威士忌。', 998, '/images/g2.jpg'),
(12, '40°法国马爹利名士干邑白兰地', '4', 659, '商务宴请，送礼好选择，搭赠2个洋酒杯', 699, '/images/g3.jpg'),
(13, '5°杰克丹尼预调酒330ml*6', '5', 799, '可乐、苹果、柠檬三种口味，5度酒精度，开瓶即饮，拥有纯正的杰克丹尼血统', 856, '/images/g4.jpg'),
(14, '西班牙小红帽干红葡萄酒', '5', 250, '西班牙DO级', 258, '/images/g5.jpg'),
(15, '【习酒特卖】53°银质习酒', '5', 108, '性价比之王，爆款推荐，口粮好酒 本产品为预售产品，7-10个工作日发货', 199, '/images/g6.jpg'),
(16, '52°酒鬼原浆酒500ml', '5', 199, '精致绳子', 299, '/images/g7.jpg'),
(17, '【礼盒】54°董酒尊享封藏大坛', '5', 399, '亲民收藏级', 558, '/images/g8.jpg'),
(18, '53°珍酒老珍酒 ', '5', 188, '贵州酱香型白酒礼盒装 易地茅台酒 固态纯粮 500ml单瓶  珍酒冰点价优惠多多', 198, '/images/g9.jpg'),
(19, '52°沱牌舍得酒500ml', '5', 438, '破损包赔', 488, '/images/g10.jpg'),
(20, '德国进口啤酒费尔德堡小麦白', '1', 11, '口感浓郁醇厚 18年3月生产 保质期到19年5月', 119, '/images/g11.jpg'),
(21, '德国进口啤酒慕尼黑范佳乐', '5', 119, '清仓啤酒日期到2018年11月25号左右 介意日期慎拍！', 289, '/images/g12.jpg'),
(22, '12°古越龙山五年状元红2500ml', '5', 109, '紫砂陶坛 五年陈酿 大坛礼盒装', 139, '/images/g13.jpg'),
(23, '德国啤酒皇家勇士小麦白啤酒', '5', 89, '2017年9月生产 2019年3月到期', 168, '/images/g14.jpg'),
(24, '黑啤酒保拉纳柏龙黑啤酒5L桶装', '5', 108, '18年4月产，19年1月到期，保质期9个月', 158, '/images/g15.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `goods_id`, `count`) VALUES
(1, 1, 1, 6),
(2, 1, 2, 4),
(3, 1, 1, 222),
(4, 5, 10, 2),
(5, 5, 10, 2),
(6, 13, 1, 1),
(7, 10, 11, 1),
(8, 10, 1, 22),
(9, 11, 1, 33),
(10, 10, 1, 20),
(11, 10, 19, 1),
(12, 10, 12, 1),
(13, 10, 12, 1),
(14, 10, 12, 1);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `tel` varchar(30) DEFAULT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT '/user/touxiang/default.jpg',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `uname`, `pwd`, `tel`, `sex`, `email`, `address`, `avatar`) VALUES
(1, 'test', '123456', '15766668888', '1', '124142@qq.com', '山东省', '/user/touxiang/1.jpg'),
(2, 'test1', '111111', '111111', '女', '123123@qq.com', '浙江省', NULL),
(4, 'u001', '123456', '13966889999', '1', '13966889999@139.com', '北京市亦庄', NULL),
(10, 'qq', '123456', 'q', 'a', 'a', 'a', '/user/touxiang/default.jpg'),
(11, 'ww', '123456', '123', '1', '1', '1', NULL),
(12, 'qqq', '123456', '123456', 'q', 'q', 'q', '/user/touxiang/default.gif'),
(13, '11', '123456', '1', '0', '1', '1', '/user/touxiang/default.gif');

-- --------------------------------------------------------

--
-- 表的结构 `wenzhang`
--

CREATE TABLE IF NOT EXISTS `wenzhang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `wenzhang`
--

INSERT INTO `wenzhang` (`id`, `title`, `content`, `author`, `time`) VALUES
(1, '"解百纳"商标引纠纷,张裕公司起诉龙徽酿酒索赔50万', '&nbsp;&nbsp;&nbsp;&nbsp;中新经纬客户端7月4日电 据北京海淀法院网4日消息，因认为北京龙徽酿酒有限公司未经许可，擅自生产和销售带有“解百纳”字样的葡萄酒，烟台张裕葡萄酿酒股份有限公司以商标权权属、侵权纠纷为由，将该公司诉至法院，要求赔偿其经济损失50万元。日前，海淀法院受理了此案。  <br>\n&nbsp;&nbsp;&nbsp;&nbsp;原告烟台张裕公司诉称，其公司创立于1892年，是国内最早也是最大的葡萄酒酿造商，“解百纳”作为该公司的核心子品牌，已于2012年被认定为中国驰名商标。原告在福建某购物商城内买到一瓶标有“解百纳”字样的侵权葡萄酒产品，该产品由北京龙徽公司生产，在福建、江苏等地均有销售。北京龙徽公司成立于1987年，注册资本达2亿余元人民币，是大型老牌酒水生产厂家，其侵权故意明显，情节恶劣，给烟台张裕公司带来巨大的经济损失和商誉损失。故原告诉至法院，请求判令被告停止侵权，并赔偿经济损失50万元。  目前，此案正在进一步审理中。', 'admin', '2018-09-21 12:48:59'),
(2, '中国葡萄酒行业现状解析成功的秘诀竟然是这样', '&nbsp;&nbsp;&nbsp;&nbsp;2018年上半年财报季落下帷幕，与我国白酒的“整体复苏”相比，国产葡萄酒也显现出了难得的“暖意”。<br>\n&nbsp;&nbsp;&nbsp;&nbsp;公开数据显示，2018年上半年我国14家葡萄酒上市公司，总营收43.34亿元，较去年小幅上涨4%。除莫高股份等4家上市公司销售额下滑外，其余10家均保持增长。然而，相较于白酒市场，国产葡萄酒依然体量偏小。酒水分析师蔡学飞这样评价国产葡萄酒的生存状况：产品结构低端、品牌老化严重、受到进口酒冲击、消费升级与渠道结构变化等影响，企业经营情况开始分化，但是整体依然在恶化。国产葡萄酒行业未来如何前行，值得业内深思。', 'admin', '2018-09-21 12:50:39'),
(3, '五星酒业推出白酒创新模式，值得称赞', '&nbsp;&nbsp;&nbsp;&nbsp;2018年9月12日，北京市丰台区卢沟桥集美广场内人声鼎沸，热闹非凡。北京首家茅台镇五星酒厂体验馆在此良辰吉日隆重开业!    作为贵州五星酒业集团全力打造的厂家直营品牌项目，此次五星酒厂体验馆隆重降临北京城，受到了业界的广泛关注，开业庆典当日高朋满座，气氛热烈。<br>      \n&nbsp;&nbsp;&nbsp;&nbsp;中国中小型企业副会长、圣德书院院长张海良，北京大兴区经信委副主任张秀萍、北京奥宇集团董事长刘国恩、北京住宅房地产业商会会长黎乃超等百余位嘉宾代表以及贵州五星酒业集团董事长焦永权、北京茅台镇五星酒厂体验馆总经理田娜等出席了开业典礼。    <br>\n&nbsp;&nbsp;&nbsp;&nbsp;开业庆典上，集美广场卢沟桥店总经理曲晓红、圣德书院院长张海良、北京住宅房地产业商会会长黎乃超等分别上台进行了精彩致辞，对茅台镇五星酒厂体验馆开业表示热烈祝贺，并表达了对五星酒业体验馆创新模式的赞赏和美好祝愿。    庆典还为宾客们准备了精彩的节目表演，“北京凤乐团”的开场击鼓表演大气磅礴，精彩绝伦;来自北京凤乐团教育中心的两个小女孩的一曲《你是我的眼》，宛如天籁，打动人心。央视《星光大道》六强歌唱艺术家、魅力警官马丽为大家带来精彩演出，并与贵州五星集团董事长焦永权共同演唱了一首《莫斯科郊外的晚上》，赢得了现场一片热烈的掌声，将庆典气氛推向了高潮! <br>\n&nbsp;&nbsp;&nbsp;&nbsp;   作为贵州五星酒业集团创始人，五星酒厂体验馆模式的缔造者，焦永权在庆典的发言中着重向大家阐述了体验馆模式的核心理念和发展潜力。焦永权表示，体验馆是一种全新的商业模式，是白酒发展的必然趋势。未来消费者消费更注重体验，只有拥有良好的体验感，消费者才会选择去购买。我们只有把握了消费升级态势，做符合时代发展的生意才有出路。    在演说过程中，焦永权向大家全面介绍了茅台镇五星酒厂体验馆在未来发展战略中的强大优势。他对模式在全国的展开充满了信心，五星酒业集团25年生产型企业的实力及多年品牌打造积累，上千代理商的成功合作经验，良好企业口碑及产品生产及运作能力都将为项目的代理商们免除后顾之忧。', '匿名', '2018-09-21 12:51:26'),
(5, '走优质化路线啤酒股跑赢中国啤酒MPI指数', '&nbsp;&nbsp;&nbsp;&nbsp;大和资本发表内地啤酒业研究报告指出，今年上半年，内地四大啤酒制造商在销量增长减弱下，平均销售价及税前息前折旧前摊销前利润率(EBITDA argin)好坏参半。反观外国品牌销量有较强劲的增长并走高档化路线，但内地则有较强的价格管制。该行重申对华润啤酒(30.5,1.05, 3.57%)(00291)的“买入”评级，认为该公司有较高提价能力，仍视之为首选股。大和予青岛啤酒(33.8, 0.45, 1.35%)(00168)“持有”的评级，而对整个板块则维持“中性”看法。<br>  \n&nbsp;&nbsp;&nbsp;&nbsp;  (图片来源网络，如有侵权请联系本站)  该行引述报告指，青岛啤酒在高档及中价产品市场失去市占率。在高档产品方面，消费者由本土品牌转移到国际品牌;中价产品方面，来自本地对手如华润雪花的竞争加剧，因此将该公司2018-20年度的每股盈利预测调低1-11%，目标价也降至35.2元。报告说，外国品牌的盈利能力加强，受赞助世界盃的影响，世界最大的啤酒製造商Anheuser-Busch InBev(AB InBev)于今年上半年的均价及税前息前折旧前摊销前利润率于内地急速上升。  尽管如此，受惠于低基数及较好经济规模，内地啤酒制造商华润啤酒亦于以上两方面急起直追。上半年，内地同业的EBITDA Margin大约在15-17%水平，较AB InBev全球平均37%低。与此同时，行业的高档产品销量增长维持在双位数，该行预期，如华润啤酒与喜力(Heineken)达成合作协议，其税前息前折旧前摊销前利润率在长远而言可以达国际水平。', 'admin', '2018-09-21 12:51:57'),
(6, '首届中国露酒高峰论坛亮点多：创领露酒新业态', '&nbsp;&nbsp;&nbsp;&nbsp;9月20日下午，第一届中国露酒高峰论坛在汾阳贾家庄召开，作为2018山西(汾阳·杏花村)世界酒文化博览会的重要组成部分，到场嘉宾围绕“大健康风口——创领中国露酒发展新时代”进行了深度分享。<br>\n&nbsp;&nbsp;&nbsp;&nbsp;中国酒业协会副理事长兼秘书长宋书玉，中国疾病预防控制中心流病办主任、研究员、中国健康管理协会标准化与评价分会会长么鸿雁，江南大学生物工程学院教授范文来等行业领导、专家学者，中国保健酒联盟秘书长、劲牌公司总裁助理吴刚，古井集团副总裁、古井健康产业公司董事长程莉，海南椰岛(集团)公司总裁助理王正强等露酒名企代表，汾阳市委副书记、市长吴晓东，副市长闫成虎，汾酒集团副董事长、总经理、股份公司董事长谭忠豹，汾酒集团副董事长、副总经理刘卫华，汾酒股份公司副董事长、总经理常建伟，以及来自全国各地的媒体记者、酒企代表、经销商代表500余人参加了会议。', 'admin', '2018-09-21 12:52:21'),
(7, '引领酱酒产区 遵义下了一盘什么棋', '&nbsp;&nbsp;&nbsp;&nbsp;9月9日，在2018年贵州内陆开放型经济试验区投资贸易洽谈会上，举行了以“高端交流、高效合作、资源共享、引领未来”为主题的贵州省白酒产业振兴与发展研讨会。本次会议旨在进一步巩固推进遵义白酒产业发展，促进结构优化和转型升级，延伸产业链，扎实推进白酒产业专题招商工作，把遵义市打造成为引领中国酱香型白酒的领头羊。  <br>\n&nbsp;&nbsp;&nbsp;&nbsp;放到整个行业来看，此事充满着竞争的意味。9月5日，四川省泸州市“中国酒城·泸州”顺利经过专家组命名考评;8月27日，宿迁市人民政府与中国酒业协会共建“中国(宿迁)白酒之都”战略合作签约仪式达成;8月23日，山西汾阳宣布成为2019年比利时布鲁塞尔国际烈性酒大奖赛举办地。<br>\n&nbsp; &nbsp;&nbsp;&nbsp; 纵观看来，浓香白酒产区宜宾、泸州、宿迁崛起，清香型白酒开创者汾阳独抗大旗，在酱酒热潮涌来的当下，以茅台酒为核心的中国酱酒产区遵义，正在下一盘什么棋?', 'admin', '2018-09-21 12:52:46'),
(10, '中秋国庆节临近白酒进入销售旺季 行业迎来估值修复时机', '&nbsp;&nbsp;&nbsp;&nbsp;距离一年一度的中秋国庆节越来越近了，白酒行业也开始迎来年中最热的销售旺季。<br>&nbsp;&nbsp;&nbsp;&nbsp;\n\n本周，白酒的在中高端品种股票的攻势下出现了转强的走势，A股同花顺白酒行业指数在近日终于逆转了2月来的秃势，接连几日较为有力的反弹重新使指数站回了10日均线的上方。<br>&nbsp;&nbsp;&nbsp;&nbsp;\n\n有分析认为，如今白酒行业基本面表现依旧良好，叠加中秋及国庆的黄金销售时期，以及昨日国家出台促消费重磅文件出台，意见点题以吃穿用住行消费为首的七大消费增长点的利好刺激，白酒行业或准备迎来一波明确的估值修复窗口。', 'admin', '2018-09-21 12:56:19');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
