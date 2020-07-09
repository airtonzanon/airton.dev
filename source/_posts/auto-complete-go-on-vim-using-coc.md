---
createdAt: 2020-07-09
title: Auto-complete Go on VIM using Coc
language: EN

---

Well, we gonna start touching some Go in my company. As I'm trying to use **VIM** as much as I can, I decided to use it every time I touch a Go file.

So I started setting up my environment for it, first I needed to setup my `GOPATH` into my `PATH` environment variable, so:

```
export PATH=$PATH:$GOPATH/bin

# If your $GOPATH variable is empty, just do it:  
export GOPATH=$HOME/go
```

Here, for the auto-complete stuff, we gonna use [gopls](https://github.com/golang/tools/tree/master/gopls) (pronunciation: "go please"), it's the official [language server](https://langserver.org/) for the Go language.

For installation you need to run the line below:
```
GO111MODULE=on go get golang.org/x/tools/gopls@latest
```

To see if it's working properly just try run `gopls --help`. It should be working because we already added the `$GOPATH` to `$PATH` environment variable, if it's not working, take a look on your `$HOME/go/bin` directory, if the `gopls` file is there, then it might be a problem pointing the go path to the path variable, if it's not there, might be a problem on the installation above.

Now it's time to setup `coc`, inside vim, just run `:CocConfig`. If you don't have any language server configured yet, just paste it there:

```
{
  "languageserver": {
   "golang": {
      "command": "gopls",
      "rootPatterns": ["go.mod", ".vim/", ".git/", ".hg/"],
      "filetypes": ["go"],
      "initializationOptions": {
        "usePlaceholders": true
      }
    }
  }
}
```

If you already have a language server there, just add the `"golang"` node inside `"languageserver"`.

The result in a Go file will be something like the one below:

![Auto Complete for Go on VIM with Coc](/assets/images/vim-coc-gopls.png)
