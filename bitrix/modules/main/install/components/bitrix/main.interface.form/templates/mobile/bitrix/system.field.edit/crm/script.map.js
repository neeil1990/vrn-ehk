{"version":3,"file":"script.min.js","sources":["script.js"],"names":["window","repo","BX","namespace","CRM","UFMobile","UF","params","this","dialogName","id","controlName","util","getRandomString","container","dropNode","delegate","types","findChildren","tagName","type","entity","t","dd","i","j","entities","length","getAttribute","toLowerCase","findChild","prefix","viewUrl","selectUrl","replace","title","innerHTML","value","bindNode","push","bind","proxy","showAdd","eventName","BXMobileApp","addCustomEvent","buildNode","prototype","lead","contact","company","deal","quote","e","PreventDefault","showSelector","buttons","hasOwnProperty","callback","url","PageManager","loadPageModal","bx24ModernStyle","cache","app","enableInVersion","UI","ActionSheet","show","node","parentNode","del","loadPageUnique","in_array","create","attrs","html","join","appendChild","onCustomEvent","delNode","proxy_context","target","toLocaleLowerCase","array_search","splice","removeChild","add","Disk","getByName","name","ii"],"mappings":"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"}