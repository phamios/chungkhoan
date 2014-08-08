" Set 'nocompatible' to ward off unexpected things that your distro might
" have made, as well as sanely reset options when re-sourcing .vimrc
set nocompatible

" Set dark background
set background=dark

" Syntax highlighting
syntax enable

" Set encoding
set encoding=utf-8

" Set colorscheme
"colorscheme desert
"colorscheme pyte
"colorscheme grb256 
"colorscheme vividchalk 
"colorscheme distinguished 
"colorscheme developer 
"colorscheme tidy 

" Enable file type detection
if has("autocmd")
  filetype plugin indent on
endif

" Do smart autoindenting when starting a new line 
set smartindent

" Show matched pattern when search
set incsearch

" Highlight mathed pattern
set hlsearch

" Ignore case of normal letter
set ignorecase

" Override the 'ignorecase' option if 
" the search pattern contains upper case characters
set smartcase

" Smart with tab
set smarttab

" Show line and column of cursor position
set ruler

" Show command
set showcmd

" Complete longest common string, then each full match
set wildmode=longest:full
set wildmenu

" Adding character form pairs
set matchpairs+=<:>

" Number of space that <Tab> count
set tabstop=4

" In Insert mode: Use the appropriate number of spaces to insert a <Tab>
set expandtab

" Number of spaces to use for each step of (auto)indent)
set shiftwidth=4

" Round indent to multiple of 'shiftwidth'
set shiftround

" Don't wrap long line
set nowrap

" Allow backspace over anything
set backspace=indent,eol,start

" Show full path file
set laststatus=2
set statusline=%<\ %F\ %m%r-\ FileType:\ %y%=%-35.(line:\ %l\ of\ %L,\ col:\ %c%V\ (%P)%)

" List tree view
let g:netrw_liststyle=3
let g:netrw_browse_split=3

" Open new buffer in new tab
"autocmd BufAdd,BufNewFile * nested tab sball

" Set backup
if has("vms")
    set nobackup
else
    set backup
endif

set backupdir=~/.vim/backup/
set dir=~/.vim/backup/

" Back to last edited line
if has("autocmd")
  au BufReadPost * if line("'\"") > 1 && line("'\"") <= line("$") | exe "normal! g'\"" | endif
endif

" Turn off highlight search in insert mode
augroup hlsearch
    autocmd!
    autocmd InsertEnter * :setlocal nohlsearch
    autocmd InsertLeave * :setlocal hlsearch
augroup END

" Show help full screen
autocmd FileType help only

" Don't add comment automatically
autocmd FileType * setlocal formatoptions-=c formatoptions-=r formatoptions-=o

" Use system clipboard
set clipboard=unnamedplus

" Show long line indicator
if v:version >= 703
    augroup colorcolumn
        autocmd!
        autocmd FileType python setlocal colorcolumn=78
        autocmd FileType c setlocal colorcolumn=80
        autocmd FileType cpp setlocal colorcolumn=80
        autocmd FileType perl setlocal colorcolumn=100
    augroup END
endif

" Salt state files
augroup sls
    autocmd!
    " Function to setting sls file
    function Slsconfig()
        if getline(1) =~# '\v^#!py(dsl|)$'
            set filetype=python
            setlocal tabstop=4
            setlocal shiftwidth=4
        else
            set filetype=yaml
            setlocal tabstop=2
            setlocal shiftwidth=2
        endif
    endfunction

    autocmd BufRead,BufNewFile *.sls call Slsconfig()
augroup END

" Python
fun Python_config()
    NeoBundleSource vim-python-pep8-indent
    let g:pydiction_location = '~/.vim/bundle/pydiction/complete-dict'
endf
autocmd Filetype python :call Python_config()

" Javascript
autocmd FileType javascript set omnifunc=javascriptcomplete#CompleteJS

" HTML
autocmd FileType html set omnifunc=htmlcomplete#CompleteTags

" PHP
autocmd FileType php set omnifunc=phpcomplete#CompletePHP

"""""""""""""
" bind keys "
"""""""""""""

map \c i{<Esc>ea}<Esc>
map \p i(<Esc>ea)<Esc>
map \q i'<Esc>ea'<Esc>
map \dq i"<Esc>ea"<Esc>
map \C :%s///gn<CR>

inoremap jk <Esc>
nnoremap <silent> <Space> :nohlsearch<Bar>:echo<CR>
nnoremap <silent> <F3> :set cuc! cul!<CR>
nnoremap <silent> <F4> :set nu!<CR>
nnoremap <silent> <F5> :Texplore<CR>
set pastetoggle=<F2>

inoremap {      {}<Left>
inoremap {<CR>  {<CR>}<Esc>O
inoremap {;<CR>  {<CR>};<Esc>O
inoremap {{     {
inoremap {}     {}

inoremap [      []<Left>
inoremap [<CR>  [<CR>]<Esc>O
inoremap [[     [
inoremap []     [] 

inoremap (      ()<Left>
inoremap (<CR>  (<CR>)<Esc>O
inoremap (;<CR>  (<CR>);<Esc>O
inoremap ((     (
inoremap ()     ()

nnoremap <leader>s :w!<CR>

""""""""""""""""""
" Custom tabline "
""""""""""""""""""
set tabline=%!MyTabLine()
function MyTabLine()
    let s = '' " complete tabline goes here
    " loop through each tab page
    for t in range(tabpagenr('$'))
        " set highlight
        if t + 1 == tabpagenr()
            let s .= '%#TabLineSel#'
        else
            let s .= '%#TabLine#'
        endif
        " set the tab page number (for mouse clicks)
        let s .= '%' . (t + 1) . 'T'
        let s .= ' '
        " set page number string
        let s .= t + 1 . ' '
        " get buffer names and statuses
        let n = ''      "temp string for buffer names while we loop and check buftype
        let m = 0       " &modified counter
        let bc = len(tabpagebuflist(t + 1))     "counter to avoid last ' '
        " loop through each buffer in a tab
        for b in tabpagebuflist(t + 1)
            " buffer types: quickfix gets a [Q], help gets [H]{base fname}
            " others get 1dir/2dir/3dir/fname shortened to 1/2/3/fname
            if getbufvar( b, "&buftype" ) == 'help'
                 let n .= '[H]' . fnamemodify( bufname(b), ':t:s/.txt$//' )
            elseif getbufvar( b, "&buftype" ) == 'quickfix'
                 let n .= '[Q]'
            else
                 let n .= pathshorten(bufname(b))
            endif
            " check and ++ tab's &modified count
            if getbufvar( b, "&modified" )
                 let m += 1
            endif
            " no final ' ' added...formatting looks better done later
            if bc > 1
                 let n .= ' '
            endif
            let bc -= 1
        endfor
        " add modified label [n+] where n pages in tab are modified
        if m > 0
             let s .= '[' . m . '+]'
        endif
        " select the highlighting for the buffer names
        " my default highlighting only underlines the active tab
        " buffer names.
        if t + 1 == tabpagenr()
             let s .= '%#TabLineSel#'
        else
             let s .= '%#TabLine#'
        endif
        " add buffer names
        if n == ''
             let s.= '[New]'
        else
             let s .= n
        endif
        " switch to no underlining and add final space to buffer list
        let s .= ' '
    endfor
    " after the last tab fill with TabLineFill and reset tab page nr
    let s .= '%#TabLineFill#%T'
    " right-align the label to close the current tab page
    if tabpagenr('$') > 1
         let s .= '%=%#TabLineFill#%999Xclose'
    endif
    return s
endfunction

""""""""""""""""""""""""""""""""
"Tab Completion in Insert Mode "
""""""""""""""""""""""""""""""""

function! Tab_Or_Complete()
  if col('.') > 1 && strpart( getline('.'), col('.') - 2, 3 ) =~ '^\w'
    return "\<C-N>"
  else
    return "\<Tab>"
  endif
endfunction
inoremap <Tab> <C-R>=Tab_Or_Complete()<CR>
