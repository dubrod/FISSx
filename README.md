FISSx
=====

Filterable Infinite Scroll Snippet

==
##### AUTHORS #####

Wayne Roddy (@dubrod)

Jan Peca    (@TheBoxer)
==
**Published**

2014/04/25 on a late friday night

==

This snippet should be used to create one of those cool Infinite Scroll (or not) Content Sections with a Filterable Category Listings. There is **no frontend** code including, that should be customized to your design.

==

### Step 1 ###

**Dummy Content and Category Structure**

![resource tree](screencasts/demo-resources.jpg "Resource Tree")

### Step 2 ###

**Create your Category List**

If your resource tree looks like the above you should be able to use *getResources* by default to get the list like this:

```
<ul id="category_list">
	<li class="cat_item active"><a href="javascript:void(0)" class="all">Show All</a></li>
					 	
	[[!getResources? &parents=`[[*id]]` &tpl=`infinite-parent-list` &sortby=`menuindex` &sortdir=`ASC` &limit=`5` &includeTVs=`1` &depth=`1` &where=`{"template:=":XXX}`]]

</ul>
```

***Don't forget to insert your template ID for this page**
This Page is ran on the **ROOT Page aka Grandparent**
