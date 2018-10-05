
## JavaScript 生成 uuid

很多时候，我们需要一个ID来标识我们的数据记录，才能够准备对数据进行定位操作，而生成这样一个ID可以使用下面的方法

```javascript
function uuid(len = 10, radix = 10) {
    let chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.split('');
    let uuid_arr = [], i;
    radix = radix || chars.length;
    if (len) {
        for (i = 0; i < len; i++) uuid_arr[i] = chars[0 | Math.random() * radix];
    } else {
        let r;
        uuid_arr[8] = uuid_arr[13] = uuid_arr[18] = uuid_arr[23] = '-';
        uuid_arr[14] = '4';
        for (i = 0; i < 36; i++) {
            if (!uuid_arr[i]) {
                r = 0 | Math.random() * 16;
                uuid_arr[i] = chars[(i === 19) ? (r & 0x3) | 0x8 : r];
            }
        }
    }
    return uuid_arr.join('');
}
```

如果觉得随机字符串还不够能满足，可以在前面追加时间戳