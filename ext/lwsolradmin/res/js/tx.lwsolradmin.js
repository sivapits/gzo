Ext.ns('tx.lwsolradmin');

Ext.onReady( function() {

	var viewport;
	var ds;
	var grid;

	//  Create datasource
	// ----------------
	function createDS() {
		ds = new Ext.data.Store({
			proxy: new Ext.data.HttpProxy({

				url: tx.lwsolradmin.path_typo3 + 'ajax.php?ajaxID=tx_lwsolradmin::results&qry=',
//				url: 'search.php', // serverside script to post to
				method: 'POST' // method of posting .. GET or POST .. I've used POST
			}),

			// the reader
			reader: new Ext.data.JsonReader({
				totalProperty: 'total',
				root: 'results', // the object wich old the records
				id: 'id', // the fieldname wich hold the id ... optional
				fields: ['id','url','site','title','type','siteHash'] // the fields the reader need to render 
			})
		});
		/*ds.load({
			params:
			{
				qry:"dummy",
				show:"all"
			}
		});
		*/
	}

	function createViewPort(){
		tx.lwsolradmin.viewport = new Ext.Viewport({
			layout: "border",
			renderTo: Ext.getBody(),
			items: [{
				region: "north",
				xtype: 'form',
				title: 'Solr Filtering Form',
				bodyStyle:'padding:5px 5px 0',
				frame:true,

				defaultType: 'textfield',
				items: [{
					fieldLabel: 'Amount of results',
					name: 'numresults',
					allowBlank:true
				},{
					fieldLabel: 'URL',
					name: 'filters_url'
				},{
					fieldLabel: 'Site',
					name: 'filters_site'
				},{
					fieldLabel: 'siteHash',
					name: 'filters_siteHash'
				},{
					fieldLabel: 'Title',
					name: 'filters_title'
				},{
					fieldLabel: 'Type',
					name: 'filters_type'
				}
				],
				buttons: [{
					text: 'Search',
					handler: function(){
						ds.load({
							params:
							{   
								query:"dummy",
								show:"all"
							}
						});
					}

				},{
					text: 'Reset form',
					handler: function(){
						ds.load({
							params:
							{   
								qry:"clear",
								show:"none"
							}
						});
					}

					}],
					split: true,
					height:250,
					collapsible: true,
				},{
					region: 'center',
					xtype: 'panel',
					title: 'results',



					items:[{
						xtype: 'grid',
						store: ds,

						// make the columns fit
						viewConfig: 
						{
							forceFit:true
						},

						//          plugins: expander,
						collapsible: true,
						animCollapse: false,

						// yeah zebra stripes
						stripeRows:true,

						autoHeight:true,

						columns: [{
							dataIndex: 'id',
							header: 'ID',
							sortable: true,
							width: 100
						},
						{
							dataIndex: 'url',
							header: 'URL',
							sortable: true,
							width: 100,
						},
						{
							dataIndex: 'site',
							header: 'Site',
							sortable: true,
							width: 100
						},
						{
							dataIndex: 'title',
							header: 'Title',
							sortable: true,
							width: 100
						},
						{
							dataIndex: 'type',
							header: 'Type',
							sortable: true,
							width: 100
						},
						{
							dataIndex: 'siteHash',
							header: 'siteHash',
							sortable: true,
							width: 100
						}
					]
				}
			]
			},{
				region: 'east',
				xtype: 'panel',
				split: true,
				width: 200,
				collapsible:true,
				//html: 'I am on the right side of the screen',
				html: tx.lwsolradmin.path_typo3 + 'ajax.php?ajaxID=tx_lwsolradmin::results&qry='
			},{
				region: 'south',
				xtype: 'panel',
				html: 'Put footer stuff here'
			}]
		});
	}

	createDS();
	createViewPort();

});
