{"version":3,"sources":["editor_panel.js"],"names":["BX","namespace","proxy","Landing","Utils","getSelectedElement","UI","Panel","EditorPanel","BaseButtonPanel","apply","this","arguments","layout","classList","add","position","currentElement","makeDraggable","registerBaseActions","appendToBody","rect","getBoundingClientRect","instance","getInstance","scrollHandler","target","onShow","node","onScroll","bind","document","addEventListener","onKeydown","window","passive","err","onHide","removeEventListener","event","which","nodeName","preventDefault","range","getSelection","getRangeAt","br","create","deleteContents","insertNode","createRange","setStartAfter","collapse","sel","removeAllRanges","addRange","setTimeout","adjustPosition","editor","dragButton","Button","EditorAction","html","attrs","title","message","onbxdrag","onDrag","onbxdragstop","onDragEnd","jsDD","registerObject","prependButton","offsetCalculates","offsetLeft","offsetTop","x","y","pos","current_node","Math","max","abs","left","top","DOM","write","remove","style","addButton","onClick","adjustButtonsState","CreateLink","ColorAction","text","TextBackgroundAction","lastPosition","adjustAbsolutePosition","force","nodeRect","width","height","bottom","pageYOffset","innerWidth","hideButtonsPopups","body","appendChild","mouseTarget","onMousedown","preventClick","onMouseUp","stopPropagation","closePopup","button","popup","close","menu","buttons","forEach","additionalButtons","Tool","ColorPicker","hideAll","prototype","constructor","__proto__","show","element","insertAfter","prevSibling","querySelector","isShown","onCustomEvent","call","hide","getAction","value","key","get","requestAnimationFrame","format","getFormat","bold","italic","underline","strike","align","getComputedStyle","getPropertyValue","includes","match","closest","isFixed"],"mappings":"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","file":"editor_panel.map.js"}