## vim 打怪升级
学习 vim 并且其会成为你最后一个使用的文本编辑器。没有比这个更好的文本编辑器了，非常地难学，但是却不可思议地好用。

### 第一阶段，存活

你能在vim幸存下来只需要下述的那5个命令，你就可以编辑文本了，你一定要把这些命令练成一种下意识的状态。于是你就可以开始进阶到第二级了。

```shell
i → Insert 模式，按 ESC 回到 Normal 模式.
x → 删当前光标所在的一个字符。
:wq → 存盘 + 退出 (:w 存盘, :q 退出)   （陈皓注：:w 后可以跟文件名）
dd → 删除当前行，并把删除的行存到剪贴板里
p → 粘贴剪贴板

hjkl (强例推荐使用其移动光标，但不必需) →你也可以使用光标键 (←↓↑→). 注: j 就像下箭头。
:help <command> → 显示相关命令的帮助。你也可以就输入 :help 而不跟命令。（陈皓注：退出帮助需要输入:q）
```

### 第二阶段，适应

所有的命令都需要在Normal模式下使用，如果你不知道现在在什么样的模式，你就狂按几次ESC键

```shell
# 各种插入模式
a → 在光标后插入
o → 在当前行后插入一个新行
O → 在当前行前插入一个新行
cw → 替换从光标所在位置后到一个单词结尾的字符

# 简单的光标移动
0 → 数字零，到行头
^ → 到本行第一个不是blank字符的位置（所谓blank字符就是空格，tab，换行，回车等）
$ → 到本行行尾
g_ → 到本行最后一个不是blank字符的位置。
/pattern → 搜索 pattern 的字符串（陈皓注：如果搜索出多个匹配，可按n键到下一个）

# 粘贴/拷贝
P → 粘贴
yy → 拷贝当前行当行于 ddP

# 撤销/重做
u → undo
<C-r> → redo

# 打开/保存文件
:e <path/to/file> → 打开一个文件
:w → 存盘
:saveas <path/to/file> → 另存为 <path/to/file>
:x， ZZ 或 :wq → 保存并退出 (:x 表示仅在需要时保存，ZZ不需要输入冒号并回车)
:q! → 退出不保存 :qa! 强行退出所有的正在编辑的文件，就算别的文件有更改。
:bn 和 :bp → 你可以同时打开很多文件，使用这两个命令来切换下一个或上一个文件。（陈皓注：我喜欢使用:n到下一个文件）
```

### 第三阶段，更好，更快，更强

先恭喜你！你干的很不错。我们可以开始一些更为有趣的事了。在第三级，我们只谈那些和vi可以兼容的命令。

#### 更好

- . → (小数点) 可以重复上一次的命令
- N<command> → 重复某个命令N次

```shell
2dd → 删除2行
3p → 粘贴文本3次
100idesu [ESC] → 会写下 “desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu desu “
. → 重复上一个命令—— 100 “desu “.
1. → 重复 3 次 “desu” (注意：不是 300，你看，VIM多聪明啊).
```

#### 更强

- NG → 到第 N 行 （陈皓注：注意命令中的G是大写的，另我一般使用 : N 到第N行，如 :137 到第137行）
- gg → 到第一行。（陈皓注：相当于1G，或 :1）
- G → 到最后一行。

按单词移动：

```shell
w → 到下一个单词的开头。
e → 到下一个单词的结尾。
> 如果你认为单词是由默认方式，那么就用小写的e和w。默认上来说，一个单词由字母，数字和下划线组成.

> 如果你认为单词是由blank字符分隔符，那么你需要使用大写的E和W.
```

下面，让我来说说最强的光标移动：

```shell
% : 匹配括号移动，包括 (, {, [. （陈皓注：你需要把光标先移到括号上）
* 和 #:  匹配光标当前所在的单词，移动光标到下一个（或上一个）匹配单词（*是下一个，#是上一个）
```

#### 更快

你一定要记住光标的移动，因为很多命令都可以和这些移动光标的命令连动。很多命令都可以如下来干：

```html
<start position><command><end position>
```

例如 0y$ 命令意味着：

- 0 → 先到行头
- y → 从这里开始拷贝
- $ → 拷贝到本行最后一个字符
你可可以输入 ye，从当前位置拷贝到本单词的最后一个字符。

你也可以输入 y2/foo 来拷贝2个 “foo” 之间的字符串。

还有很多时间并不一定你就一定要按y才会拷贝，下面的命令也会被拷贝：

```shell
d (删除 )
v (可视化的选择)
gU (变大写)
gu (变小写)
等等
```