--------------------------------------------------------
[お名前]
{$arr_post.name|default:""}

[フリガナ]
{$arr_post.ruby|default:""}

[メールアドレス]
{$arr_post.mail|default:""}

[電話番号]
{$arr_post.tel|default:""}

[ 生年月日 ]
{$arr_post.birthday|implode:"/"|date_format:"%Y年%m月%d日"}

[ご希望日時（第1希望）]
{$arr_post.date1|default:""} {$OptionTime[$arr_post.time1]}

[ご希望日時（第2希望）]
{$arr_post.date2|default:""} {$OptionTime[$arr_post.time2]}

[ご希望日時（第3希望）]
{$arr_post.date3|default:""} {$OptionTime[$arr_post.time3]}

[備考内容]
{$arr_post.comment|default:""}
