function jsTypeChanged(form_id, dropdown)
{
	var _form = document.getElementById(form_id);
	var _flag = document.getElementById('action');
	if(_form && _flag)
	{
		ShowWaitWindow();
		_flag.value = 'type_changed';
		_form.submit();
	}
}

var max_sort;

function addNewTableRow(tableID, regexp, rindex)
{
	var tbl = document.getElementById(tableID);
	var cnt = tbl.rows.length;
	var oRow = tbl.insertRow(cnt);
	var col_count = tbl.rows[cnt-1].cells.length;

	if(!max_sort)
	{
		var inpSort = BX.findChild(tbl.rows[cnt-1], {'tag':'input','class':'sort-input'}, true);
		if(inpSort)
			max_sort = parseInt(inpSort.value) + 10;
	}

	for(var i=0;i<col_count;i++)
	{
		var oCell = oRow.insertCell(i);
		var html = tbl.rows[cnt-1].cells[i].innerHTML;
		oCell.innerHTML = html.replace(regexp,
			function(html)
			{
				return html.replace('[n'+arguments[rindex]+']', '[n'+(1+parseInt(arguments[rindex]))+']');
			}
		);
	}

	var newSort = BX.findChild(tbl.rows[cnt], {'tag':'input','class':'sort-input'}, true);
	if(newSort)
	{
		newSort.value = max_sort;
		max_sort += 10;
	}
}

function jsDelete(form_id, message)
{
	var _form = document.getElementById(form_id);
	var _flag = document.getElementById('action');
	if(_form && _flag)
	{
		if(confirm(message))
		{
			_flag.value = 'delete';
			_form.submit();
		}
	}
}

function sort_up(button)
{
	var tableRow = BX.findParent(button, {'tag':'tr'});
	if(tableRow)
	{
		var upperRow = BX.findPreviousSibling(tableRow);
		if(upperRow && !BX.hasClass(upperRow, 'head'))
		{
			var table = BX.findParent(upperRow, {'tag':'table'});
			if(table)
			{
				var hiddens = update_hiddens(tableRow, upperRow);
				if(hiddens)
					table.tBodies[0].insertBefore(tableRow, upperRow);
			}
		}
	}
}

function sort_down(button)
{
	var tableRow = BX.findParent(button, {'tag':'tr'});
	if(tableRow)
	{
		var lowerRow = BX.findNextSibling(tableRow);
		if(lowerRow && !BX.hasClass(lowerRow, 'footer'))
		{
			var table = BX.findParent(lowerRow, {'tag':'table'});
			if(table)
			{
				var hiddens = update_hiddens(tableRow, lowerRow);
				if(hiddens)
					table.tBodies[0].insertBefore(lowerRow, tableRow);
			}
		}
	}
}

function update_hiddens(tableRow1, tableRow2)
{
	var hidden1 = BX.findChild(tableRow1, {'tag':'input','class':'sort-input'}, true);
	var hidden2 = BX.findChild(tableRow2, {'tag':'input','class':'sort-input'}, true);

	if(hidden1 && hidden2)
	{
		var sort1 = hidden1.value;
		var sort2 = hidden2.value;

		hidden1.value = sort2;
		hidden2.value = sort1;

		return new Array(hidden1, hidden2);
	}
	else
	{
		return false;
	}
}

function delete_item(button)
{
	var tableRow = BX.findParent(button, {'tag':'tr'});
	if(tableRow)
	{
		var hidden = BX.findChild(tableRow, {'tag':'input','class':'sort-input'}, true);
		if(hidden)
		{
			var table = tableRow.parentNode;
			table.parentNode.appendChild(hidden);
			table.removeChild(tableRow);
		}
	}
}

function toggle_input(input_id)
{
	var _input = document.getElementById(input_id);
	if(_input)
	{
		if(_input.style.display == 'block')
			_input.style.display = 'none';
		else
			_input.style.display = 'block';
	}
}