( function( api ) {

	// Extends our custom "tattoo-artist" section.
	api.sectionConstructor['tattoo-artist'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );