<?php
/**
 * markdown是一种将富文本文档标记为纯文本文档，提供格了各种转化格式，markdown无论是否转换为html都是十分易读的一种文本语言。
 * 
 * @author Administrator
 *
 */
class MarkdownController extends Controller
{
	public function actionIndex()
	{
		//通过实例化可以transform多个字符串，在模板里面使用widget，只能处理一个字符串
		$markdown = new CMarkdown();
		$str = '
			[sql]
			select * from table1 where a=1 and b=2 order by c desc limit 1,2;
		';
		echo $markdown->transform($str);
		
		
		$str = '
		[javascript]
		var a = 1;
		';
		echo $markdown->transform($str);
		$this->render('index');
	}
}