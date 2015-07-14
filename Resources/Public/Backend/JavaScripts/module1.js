TYPO3.Viewport.ContentCards.addContentCard('web_myextjs',
	{
		xtype: 'modulePanel',
		tbar: [],
		html: 'i´m the report card',
		listeners: {
			uriChanged: function(id, url) {
				var dt     = new Date();
				var buffer = '<h1>Module 1</h1>You clicked the uid ' + id + '! <br>' + url + '<br> pushed at the following millisecond ' + dt.getMilliseconds();
				this.update(buffer);
			}
		}
 
	}
);