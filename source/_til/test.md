---
createdAt: 2020-06-30
title: "VIM: Creating multiple files at once"
language: EN

---

It was really fun discovering this, I was watching @beginbot's live on twitch.tv and he got to read the vim documentation.

As I already knew, creating a file with vim is kinda easy, like: `vim file.txt`

But something that I didn't know it's that on **vim** we can create multiple files at once, so we can do it:

```
vim file1.txt file2.txt file3.txt
```

Inside vim we only need to press **esc** and write: `:next`, doing that, you can take a look on the bottom that the name of the file will change, so for each `:next` that you do, it will go to the next file.