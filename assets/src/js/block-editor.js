/* globals wp */
wp.domReady(() => {
  /**
   * Manage block registration
   */
   const allowedBlocks = [
    'core/media-text',
    'core/block',
    'core/button',
    'core/code',
    'core/buttons',
    'core/embed',
    'core/paragraph',
    'core/file',
    'core/list',
    'core/list-item',
    'core/heading',
    'core/image',
    'core/separator',
    'core/social-links',
    'core/template-part',
    'core/pullquote',
    'core/quote',
    'core/separator',
    'core/video',
    'acf/aggregate-posts'
  ]

  wp.blocks.getBlockTypes().forEach( function ( blockType ) {
      if ( -1 === allowedBlocks.indexOf( blockType.name ) ) {
          wp.blocks.unregisterBlockType( blockType.name );
      }
  } );

  /**
   * Manage embed variations
   */
  const allowedEmbedBlocks = [
      'youtube',
      'vimeo'
  ]

  // Unregister blocks not included in whitelist
  wp.blocks.getBlockVariations('core/embed').forEach(function (blockVariation) {
      if (allowedEmbedBlocks.indexOf(blockVariation.name) === -1) {
          wp.blocks.unregisterBlockVariation('core/embed', blockVariation.name)
      }
  })

  /**
   * Manage block style variations
   */
  wp.blocks.unregisterBlockStyle('core/image', ['rounded'])
  wp.blocks.unregisterBlockStyle('core/quote', ['large'])
  wp.blocks.unregisterBlockStyle('core/table', ['stripes'])


})