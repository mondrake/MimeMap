<?php

namespace FileEye\MimeMap\Map;

/**
 * Class for mapping file extensions to MIME types.
 *
 * This is MimeMap's default map.
 */
class DefaultMap extends AbstractMap
{
    /**
     * Singleton instance.
     *
     * @var DefaultMap
     */
    protected static $instance;

    /**
     * {@inheritdoc}
     */
    public function getFileName()
    {
        return __FILE__;
    }

    /**
     * {@inheritdoc}
     */
    public static function fallbackMap()
    {
        return FullMap::class;
    }

    /**
     * Mapping between file extensions and MIME types.
     *
     * The array has three main keys, 't' that stores MIME types, 'e' that map
     * file extensions to MIME types, and 'a' that store MIME type aliases.
     *
     * The entire map is created automatically by running
     *  $ fileye-mimemap update [URL] [YAML] [FILE]
     * on the command line.
     * The utility application fetches the map from the Apache HTTPD
     * documentation website, and integrates its definitions with any further
     * specifications contained in the YAML file.
     *
     * DO NOT CHANGE THE MAPPING ARRAY MANUALLY.
     *
     * @internal
     *
     * @var array
     */
    // phpcs:disable
    protected static $map = array (
  't' =>
  array (
    'application/atom+xml' =>
    array (
      'desc' =>
      array (
        0 => 'Atom syndication feed',
      ),
      'e' =>
      array (
        0 => 'atom',
      ),
    ),
    'application/epub+zip' =>
    array (
      'desc' =>
      array (
        0 => 'electronic book document',
      ),
      'e' =>
      array (
        0 => 'epub',
      ),
    ),
    'application/gzip' =>
    array (
      'a' =>
      array (
        0 => 'application/x-gzip',
      ),
      'desc' =>
      array (
        0 => 'Gzip archive',
      ),
      'e' =>
      array (
        0 => 'gz',
      ),
    ),
    'application/javascript' =>
    array (
      'a' =>
      array (
        0 => 'application/x-javascript',
        1 => 'text/javascript',
      ),
      'desc' =>
      array (
        0 => 'JavaScript program',
      ),
      'e' =>
      array (
        0 => 'js',
        1 => 'jsm',
        2 => 'mjs',
      ),
    ),
    'application/json' =>
    array (
      'desc' =>
      array (
        0 => 'JSON document',
        1 => 'JSON: JavaScript Object Notation',
      ),
      'e' =>
      array (
        0 => 'json',
      ),
    ),
    'application/ld+json' =>
    array (
      'desc' =>
      array (
        0 => 'JSON-LD document',
        1 => 'JSON-LD: JavaScript Object Notation for Linked Data',
      ),
      'e' =>
      array (
        0 => 'jsonld',
      ),
    ),
    'application/marc' =>
    array (
      'e' =>
      array (
        0 => 'mrc',
      ),
    ),
    'application/mbox' =>
    array (
      'desc' =>
      array (
        0 => 'mailbox file',
      ),
      'e' =>
      array (
        0 => 'mbox',
      ),
    ),
    'application/msword' =>
    array (
      'a' =>
      array (
        0 => 'application/vnd.ms-word',
        1 => 'application/x-msword',
        2 => 'zz-application/zz-winassoc-doc',
      ),
      'desc' =>
      array (
        0 => 'Word document',
      ),
      'e' =>
      array (
        0 => 'doc',
        1 => 'dot',
      ),
    ),
    'application/octet-stream' =>
    array (
      'e' =>
      array (
        0 => 'bin',
        1 => 'dms',
        2 => 'lrf',
        3 => 'mar',
        4 => 'so',
        5 => 'dist',
        6 => 'distz',
        7 => 'pkg',
        8 => 'bpk',
        9 => 'dump',
        10 => 'elc',
        11 => 'deploy',
      ),
    ),
    'application/pdf' =>
    array (
      'a' =>
      array (
        0 => 'application/x-pdf',
        1 => 'image/pdf',
        2 => 'application/acrobat',
        3 => 'application/nappdf',
      ),
      'desc' =>
      array (
        0 => 'PDF document',
        1 => 'PDF: Portable Document Format',
      ),
      'e' =>
      array (
        0 => 'pdf',
      ),
    ),
    'application/pgp-encrypted' =>
    array (
      'a' =>
      array (
        0 => 'application/pgp',
      ),
      'desc' =>
      array (
        0 => 'PGP/MIME-encrypted message header',
      ),
      'e' =>
      array (
        0 => 'pgp',
        1 => 'gpg',
        2 => 'asc',
      ),
    ),
    'application/pgp-signature' =>
    array (
      'desc' =>
      array (
        0 => 'detached OpenPGP signature',
      ),
      'e' =>
      array (
        0 => 'asc',
        1 => 'sig',
        2 => 'pgp',
        3 => 'gpg',
      ),
    ),
    'application/pkcs7-signature' =>
    array (
      'desc' =>
      array (
        0 => 'detached S/MIME signature',
        1 => 'S/MIME: Secure/Multipurpose Internet Mail Extensions',
      ),
      'e' =>
      array (
        0 => 'p7s',
      ),
    ),
    'application/postscript' =>
    array (
      'desc' =>
      array (
        0 => 'PostScript document',
      ),
      'e' =>
      array (
        0 => 'ai',
        1 => 'eps',
        2 => 'ps',
      ),
    ),
    'application/rdf+xml' =>
    array (
      'a' =>
      array (
        0 => 'text/rdf',
      ),
      'desc' =>
      array (
        0 => 'RDF file',
        1 => 'RDF: Resource Description Framework',
      ),
      'e' =>
      array (
        0 => 'rdf',
        1 => 'rdfs',
        2 => 'owl',
      ),
    ),
    'application/rss+xml' =>
    array (
      'a' =>
      array (
        0 => 'text/rss',
      ),
      'desc' =>
      array (
        0 => 'RSS summary',
        1 => 'RSS: RDF Site Summary',
      ),
      'e' =>
      array (
        0 => 'rss',
      ),
    ),
    'application/rtf' =>
    array (
      'a' =>
      array (
        0 => 'text/rtf',
      ),
      'desc' =>
      array (
        0 => 'RTF document',
        1 => 'RTF: Rich Text Format',
      ),
      'e' =>
      array (
        0 => 'rtf',
      ),
    ),
    'application/vnd.adobe.flash.movie' =>
    array (
      'a' =>
      array (
        0 => 'application/x-shockwave-flash',
        1 => 'application/futuresplash',
      ),
      'desc' =>
      array (
        0 => 'Shockwave Flash file',
      ),
      'e' =>
      array (
        0 => 'swf',
        1 => 'spl',
      ),
    ),
    'application/vnd.android.package-archive' =>
    array (
      'desc' =>
      array (
        0 => 'Android package',
      ),
      'e' =>
      array (
        0 => 'apk',
      ),
    ),
    'application/vnd.debian.binary-package' =>
    array (
      'a' =>
      array (
        0 => 'application/x-deb',
        1 => 'application/x-debian-package',
      ),
      'desc' =>
      array (
        0 => 'Debian package',
      ),
      'e' =>
      array (
        0 => 'deb',
        1 => 'udeb',
      ),
    ),
    'application/vnd.google-earth.kml+xml' =>
    array (
      'desc' =>
      array (
        0 => 'KML geographic data',
        1 => 'KML: Keyhole Markup Language',
      ),
      'e' =>
      array (
        0 => 'kml',
      ),
    ),
    'application/vnd.google-earth.kmz' =>
    array (
      'desc' =>
      array (
        0 => 'KML geographic compressed data',
        1 => 'KML: Keyhole Markup Language',
      ),
      'e' =>
      array (
        0 => 'kmz',
      ),
    ),
    'application/vnd.ms-asf' =>
    array (
      'a' =>
      array (
        0 => 'video/x-ms-wm',
        1 => 'video/x-ms-asf',
        2 => 'video/x-ms-asf-plugin',
      ),
      'desc' =>
      array (
        0 => 'ASF video',
        1 => 'ASF: Advanced Streaming Format',
      ),
      'e' =>
      array (
        0 => 'asf',
        1 => 'wm',
      ),
    ),
    'application/vnd.ms-excel' =>
    array (
      'a' =>
      array (
        0 => 'application/msexcel',
        1 => 'application/x-msexcel',
        2 => 'zz-application/zz-winassoc-xls',
      ),
      'desc' =>
      array (
        0 => 'Excel spreadsheet',
      ),
      'e' =>
      array (
        0 => 'xls',
        1 => 'xlm',
        2 => 'xla',
        3 => 'xlc',
        4 => 'xlt',
        5 => 'xlw',
        6 => 'xll',
        7 => 'xld',
      ),
    ),
    'application/vnd.ms-powerpoint' =>
    array (
      'a' =>
      array (
        0 => 'application/powerpoint',
        1 => 'application/mspowerpoint',
        2 => 'application/x-mspowerpoint',
      ),
      'desc' =>
      array (
        0 => 'PowerPoint presentation',
      ),
      'e' =>
      array (
        0 => 'ppt',
        1 => 'pps',
        2 => 'pot',
        3 => 'ppz',
      ),
    ),
    'application/vnd.ms-word.document.macroenabled.12' =>
    array (
      'desc' =>
      array (
        0 => 'Word document',
      ),
      'e' =>
      array (
        0 => 'docm',
      ),
    ),
    'application/vnd.oasis.opendocument.text' =>
    array (
      'desc' =>
      array (
        0 => 'ODT document',
        1 => 'ODT: OpenDocument Text',
      ),
      'e' =>
      array (
        0 => 'odt',
      ),
    ),
    'application/vnd.openxmlformats-officedocument.presentationml.presentation' =>
    array (
      'desc' =>
      array (
        0 => 'PowerPoint 2007 presentation',
      ),
      'e' =>
      array (
        0 => 'pptx',
      ),
    ),
    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' =>
    array (
      'desc' =>
      array (
        0 => 'Excel 2007 spreadsheet',
      ),
      'e' =>
      array (
        0 => 'xlsx',
      ),
    ),
    'application/vnd.openxmlformats-officedocument.wordprocessingml.document' =>
    array (
      'desc' =>
      array (
        0 => 'Word 2007 document',
      ),
      'e' =>
      array (
        0 => 'docx',
      ),
    ),
    'application/vnd.rar' =>
    array (
      'a' =>
      array (
        0 => 'application/x-rar',
        1 => 'application/x-rar-compressed',
      ),
      'desc' =>
      array (
        0 => 'RAR archive',
        1 => 'RAR: Roshal ARchive',
      ),
      'e' =>
      array (
        0 => 'rar',
      ),
    ),
    'application/x-bittorrent' =>
    array (
      'desc' =>
      array (
        0 => 'BitTorrent seed file',
      ),
      'e' =>
      array (
        0 => 'torrent',
      ),
    ),
    'application/x-bzip' =>
    array (
      'a' =>
      array (
        0 => 'application/x-bzip2',
        1 => 'application/bzip2',
      ),
      'desc' =>
      array (
        0 => 'Bzip archive',
      ),
      'e' =>
      array (
        0 => 'bz',
        1 => 'bz2',
        2 => 'boz',
      ),
    ),
    'application/x-hdf' =>
    array (
      'desc' =>
      array (
        0 => 'HDF document',
        1 => 'HDF: Hierarchical Data Format',
      ),
      'e' =>
      array (
        0 => 'hdf',
        1 => 'hdf4',
        2 => 'h4',
        3 => 'hdf5',
        4 => 'h5',
      ),
    ),
    'application/x-java-jnlp-file' =>
    array (
      'desc' =>
      array (
        0 => 'JNLP file',
        1 => 'JNLP: Java Network Launching Protocol',
      ),
      'e' =>
      array (
        0 => 'jnlp',
      ),
    ),
    'application/x-mobipocket-ebook' =>
    array (
      'desc' =>
      array (
        0 => 'Mobipocket e-book',
      ),
      'e' =>
      array (
        0 => 'prc',
        1 => 'mobi',
      ),
    ),
    'application/x-msdownload' =>
    array (
      'e' =>
      array (
        0 => 'exe',
        1 => 'dll',
        2 => 'com',
        3 => 'bat',
        4 => 'msi',
      ),
    ),
    'application/x-netcdf' =>
    array (
      'desc' =>
      array (
        0 => 'Unidata NetCDF document',
        1 => 'NetCDF: Network Common Data Form',
      ),
      'e' =>
      array (
        0 => 'nc',
        1 => 'cdf',
      ),
    ),
    'application/x-perl' =>
    array (
      'a' =>
      array (
        0 => 'text/x-perl',
      ),
      'desc' =>
      array (
        0 => 'Perl script',
      ),
      'e' =>
      array (
        0 => 'pl',
        1 => 'pm',
        2 => 'al',
        3 => 'perl',
        4 => 'pod',
        5 => 't',
      ),
    ),
    'application/x-research-info-systems' =>
    array (
      'e' =>
      array (
        0 => 'ris',
      ),
    ),
    'application/x-sh' =>
    array (
      'e' =>
      array (
        0 => 'sh',
      ),
    ),
    'application/x-tar' =>
    array (
      'a' =>
      array (
        0 => 'application/x-gtar',
      ),
      'desc' =>
      array (
        0 => 'Tar archive',
      ),
      'e' =>
      array (
        0 => 'tar',
        1 => 'gtar',
        2 => 'gem',
      ),
    ),
    'application/x-troff-man' =>
    array (
      'desc' =>
      array (
        0 => 'Manpage manual document',
      ),
      'e' =>
      array (
        0 => 'man',
      ),
    ),
    'application/x-wais-source' =>
    array (
      'desc' =>
      array (
        0 => 'WAIS source code',
      ),
      'e' =>
      array (
        0 => 'src',
      ),
    ),
    'application/x-xz' =>
    array (
      'desc' =>
      array (
        0 => 'XZ archive',
      ),
      'e' =>
      array (
        0 => 'xz',
      ),
    ),
    'application/xhtml+xml' =>
    array (
      'desc' =>
      array (
        0 => 'XHTML page',
        1 => 'XHTML: Extensible HyperText Markup Language',
      ),
      'e' =>
      array (
        0 => 'xhtml',
        1 => 'xht',
        2 => 'html',
        3 => 'htm',
      ),
    ),
    'application/xml' =>
    array (
      'a' =>
      array (
        0 => 'text/xml',
      ),
      'desc' =>
      array (
        0 => 'XML document',
        1 => 'XML: eXtensible Markup Language',
      ),
      'e' =>
      array (
        0 => 'xml',
        1 => 'xsl',
        2 => 'xbl',
        3 => 'xsd',
        4 => 'rng',
      ),
    ),
    'application/zip' =>
    array (
      'a' =>
      array (
        0 => 'application/x-zip-compressed',
        1 => 'application/x-zip',
      ),
      'desc' =>
      array (
        0 => 'Zip archive',
      ),
      'e' =>
      array (
        0 => 'zip',
        1 => 'zipx',
      ),
    ),
    'application/zlib' =>
    array (
      'desc' =>
      array (
        0 => 'Zlib archive',
      ),
      'e' =>
      array (
        0 => 'zz',
      ),
    ),
    'application/zstd' =>
    array (
      'desc' =>
      array (
        0 => 'Zstandard archive',
      ),
      'e' =>
      array (
        0 => 'zst',
      ),
    ),
    'audio/midi' =>
    array (
      'a' =>
      array (
        0 => 'audio/x-midi',
      ),
      'desc' =>
      array (
        0 => 'MIDI audio',
        1 => 'MIDI: Musical Instrument Digital Interface',
      ),
      'e' =>
      array (
        0 => 'mid',
        1 => 'midi',
        2 => 'kar',
        3 => 'rmi',
      ),
    ),
    'audio/mp4' =>
    array (
      'a' =>
      array (
        0 => 'audio/x-m4a',
        1 => 'audio/m4a',
      ),
      'desc' =>
      array (
        0 => 'MPEG-4 audio',
      ),
      'e' =>
      array (
        0 => 'm4a',
        1 => 'mp4a',
        2 => 'f4a',
      ),
    ),
    'audio/mpeg' =>
    array (
      'a' =>
      array (
        0 => 'audio/x-mp3',
        1 => 'audio/x-mpg',
        2 => 'audio/x-mpeg',
        3 => 'audio/mp3',
      ),
      'desc' =>
      array (
        0 => 'MP3 audio',
      ),
      'e' =>
      array (
        0 => 'mpga',
        1 => 'mp2',
        2 => 'mp2a',
        3 => 'mp3',
        4 => 'm2a',
        5 => 'm3a',
      ),
    ),
    'audio/vnd.rn-realaudio' =>
    array (
      'a' =>
      array (
        0 => 'audio/x-pn-realaudio',
        1 => 'audio/vnd.m-realaudio',
      ),
      'desc' =>
      array (
        0 => 'RealAudio document',
      ),
      'e' =>
      array (
        0 => 'ra',
        1 => 'rax',
      ),
    ),
    'audio/x-mpegurl' =>
    array (
      'a' =>
      array (
        0 => 'audio/mpegurl',
        1 => 'application/m3u',
        2 => 'audio/x-mp3-playlist',
        3 => 'audio/m3u',
        4 => 'audio/x-m3u',
      ),
      'desc' =>
      array (
        0 => 'Media playlist',
      ),
      'e' =>
      array (
        0 => 'm3u',
        1 => 'm3u8',
        2 => 'vlc',
      ),
    ),
    'audio/x-ms-asx' =>
    array (
      'a' =>
      array (
        0 => 'video/x-ms-wvx',
        1 => 'video/x-ms-wax',
        2 => 'video/x-ms-wmx',
        3 => 'application/x-ms-asx',
      ),
      'desc' =>
      array (
        0 => 'Microsoft ASX playlist',
      ),
      'e' =>
      array (
        0 => 'asx',
        1 => 'wax',
        2 => 'wvx',
        3 => 'wmx',
      ),
    ),
    'audio/x-scpls' =>
    array (
      'a' =>
      array (
        0 => 'application/pls',
        1 => 'audio/scpls',
      ),
      'desc' =>
      array (
        0 => 'MP3 ShoutCast playlist',
      ),
      'e' =>
      array (
        0 => 'pls',
      ),
    ),
    'audio/x-wav' =>
    array (
      'a' =>
      array (
        0 => 'audio/wav',
        1 => 'audio/vnd.wave',
      ),
      'desc' =>
      array (
        0 => 'WAV audio',
      ),
      'e' =>
      array (
        0 => 'wav',
      ),
    ),
    'image/bmp' =>
    array (
      'a' =>
      array (
        0 => 'image/x-bmp',
        1 => 'image/x-ms-bmp',
      ),
      'desc' =>
      array (
        0 => 'Windows BMP image',
      ),
      'e' =>
      array (
        0 => 'bmp',
        1 => 'dib',
      ),
    ),
    'image/gif' =>
    array (
      'desc' =>
      array (
        0 => 'GIF image',
        1 => 'GIF: Graphics Interchange Format',
      ),
      'e' =>
      array (
        0 => 'gif',
      ),
    ),
    'image/jp2' =>
    array (
      'a' =>
      array (
        0 => 'image/jpeg2000',
        1 => 'image/jpeg2000-image',
        2 => 'image/x-jpeg2000-image',
      ),
      'desc' =>
      array (
        0 => 'JPEG-2000 JP2 image',
        1 => 'JP2: JPEG-2000',
      ),
      'e' =>
      array (
        0 => 'jp2',
        1 => 'jpg2',
      ),
    ),
    'image/jpeg' =>
    array (
      'a' =>
      array (
        0 => 'image/pjpeg',
      ),
      'desc' =>
      array (
        0 => 'JPEG image',
        1 => 'JPEG: Joint Photographic Experts Group',
      ),
      'e' =>
      array (
        0 => 'jpeg',
        1 => 'jpg',
        2 => 'jpe',
      ),
    ),
    'image/png' =>
    array (
      'desc' =>
      array (
        0 => 'PNG image',
        1 => 'PNG: Portable Network Graphics',
      ),
      'e' =>
      array (
        0 => 'png',
      ),
    ),
    'image/svg+xml' =>
    array (
      'desc' =>
      array (
        0 => 'SVG image',
        1 => 'SVG: Scalable Vector Graphics',
      ),
      'e' =>
      array (
        0 => 'svg',
        1 => 'svgz',
      ),
    ),
    'image/tiff' =>
    array (
      'desc' =>
      array (
        0 => 'TIFF image',
        1 => 'TIFF: Tagged Image File Format',
      ),
      'e' =>
      array (
        0 => 'tiff',
        1 => 'tif',
      ),
    ),
    'image/vnd.djvu' =>
    array (
      'a' =>
      array (
        0 => 'image/x-djvu',
        1 => 'image/x.djvu',
      ),
      'desc' =>
      array (
        0 => 'DjVu image',
      ),
      'e' =>
      array (
        0 => 'djvu',
        1 => 'djv',
      ),
    ),
    'image/vnd.dxf' =>
    array (
      'desc' =>
      array (
        0 => 'DXF vector image',
      ),
      'e' =>
      array (
        0 => 'dxf',
      ),
    ),
    'image/vnd.microsoft.icon' =>
    array (
      'a' =>
      array (
        0 => 'application/ico',
        1 => 'image/ico',
        2 => 'image/icon',
        3 => 'image/x-ico',
        4 => 'image/x-icon',
        5 => 'text/ico',
      ),
      'desc' =>
      array (
        0 => 'Windows icon',
      ),
      'e' =>
      array (
        0 => 'ico',
      ),
    ),
    'image/webp' =>
    array (
      'desc' =>
      array (
        0 => 'WebP image',
      ),
      'e' =>
      array (
        0 => 'webp',
      ),
    ),
    'message/rfc822' =>
    array (
      'desc' =>
      array (
        0 => 'email message',
      ),
      'e' =>
      array (
        0 => 'eml',
        1 => 'mime',
      ),
    ),
    'text/calendar' =>
    array (
      'a' =>
      array (
        0 => 'text/x-vcalendar',
        1 => 'application/ics',
      ),
      'desc' =>
      array (
        0 => 'VCS/ICS calendar',
        1 => 'VCS/ICS: vCalendar/iCalendar',
      ),
      'e' =>
      array (
        0 => 'ics',
        1 => 'ifb',
        2 => 'vcs',
      ),
    ),
    'text/css' =>
    array (
      'desc' =>
      array (
        0 => 'CSS stylesheet',
        1 => 'CSS: Cascading Style Sheets',
      ),
      'e' =>
      array (
        0 => 'css',
      ),
    ),
    'text/csv' =>
    array (
      'a' =>
      array (
        0 => 'text/x-comma-separated-values',
        1 => 'text/x-csv',
      ),
      'desc' =>
      array (
        0 => 'CSV document',
        1 => 'CSV: Comma Separated Values',
      ),
      'e' =>
      array (
        0 => 'csv',
      ),
    ),
    'text/html' =>
    array (
      'desc' =>
      array (
        0 => 'HTML document',
        1 => 'HTML: HyperText Markup Language',
      ),
      'e' =>
      array (
        0 => 'html',
        1 => 'htm',
      ),
    ),
    'text/plain' =>
    array (
      'desc' =>
      array (
        0 => 'plain text document',
      ),
      'e' =>
      array (
        0 => 'txt',
        1 => 'text',
        2 => 'conf',
        3 => 'def',
        4 => 'list',
        5 => 'log',
        6 => 'in',
        7 => 'asc',
      ),
    ),
    'text/prs.lines.tag' =>
    array (
      'e' =>
      array (
        0 => 'dsc',
      ),
    ),
    'text/tab-separated-values' =>
    array (
      'desc' =>
      array (
        0 => 'TSV document',
        1 => 'TSV: Tab Separated Values',
      ),
      'e' =>
      array (
        0 => 'tsv',
      ),
    ),
    'text/troff' =>
    array (
      'a' =>
      array (
        0 => 'application/x-troff',
        1 => 'text/x-troff',
      ),
      'desc' =>
      array (
        0 => 'Troff document',
      ),
      'e' =>
      array (
        0 => 't',
        1 => 'tr',
        2 => 'roff',
        3 => 'man',
        4 => 'me',
        5 => 'ms',
      ),
    ),
    'text/turtle' =>
    array (
      'desc' =>
      array (
        0 => 'Turtle document',
      ),
      'e' =>
      array (
        0 => 'ttl',
      ),
    ),
    'text/vcard' =>
    array (
      'a' =>
      array (
        0 => 'text/directory',
        1 => 'text/x-vcard',
      ),
      'desc' =>
      array (
        0 => 'electronic business card',
      ),
      'e' =>
      array (
        0 => 'vcard',
        1 => 'vcf',
        2 => 'vct',
        3 => 'gcrd',
      ),
    ),
    'text/vnd.wap.wml' =>
    array (
      'desc' =>
      array (
        0 => 'WML document',
        1 => 'WML: Wireless Markup Language',
      ),
      'e' =>
      array (
        0 => 'wml',
      ),
    ),
    'text/vtt' =>
    array (
      'desc' =>
      array (
        0 => 'WebVTT subtitles',
        1 => 'VTT: Video Text Tracks',
      ),
      'e' =>
      array (
        0 => 'vtt',
      ),
    ),
    'text/x-bibtex' =>
    array (
      'desc' =>
      array (
        0 => 'BibTeX document',
      ),
      'e' =>
      array (
        0 => 'bib',
      ),
    ),
    'text/x-c++src' =>
    array (
      'desc' =>
      array (
        0 => 'C++ source code',
      ),
      'e' =>
      array (
        0 => 'cpp',
        1 => 'cxx',
        2 => 'cc',
        3 => 'c',
        4 => 'c++',
      ),
    ),
    'text/x-chdr' =>
    array (
      'desc' =>
      array (
        0 => 'C header',
      ),
      'e' =>
      array (
        0 => 'h',
      ),
    ),
    'text/x-csrc' =>
    array (
      'a' =>
      array (
        0 => 'text/x-c',
      ),
      'desc' =>
      array (
        0 => 'C source code',
      ),
      'e' =>
      array (
        0 => 'c',
        1 => 'dic',
      ),
    ),
    'text/x-log' =>
    array (
      'desc' =>
      array (
        0 => 'application log',
      ),
      'e' =>
      array (
        0 => 'log',
      ),
    ),
    'text/x-matlab' =>
    array (
      'a' =>
      array (
        0 => 'text/x-octave',
      ),
      'desc' =>
      array (
        0 => 'MATLAB file',
      ),
      'e' =>
      array (
        0 => 'm',
      ),
    ),
    'text/x-patch' =>
    array (
      'a' =>
      array (
        0 => 'text/x-diff',
      ),
      'desc' =>
      array (
        0 => 'differences between files',
      ),
      'e' =>
      array (
        0 => 'diff',
        1 => 'patch',
      ),
    ),
    'text/x-python' =>
    array (
      'desc' =>
      array (
        0 => 'Python script',
      ),
      'e' =>
      array (
        0 => 'py',
        1 => 'pyx',
        2 => 'wsgi',
      ),
    ),
    'text/x-tex' =>
    array (
      'a' =>
      array (
        0 => 'application/x-tex',
      ),
      'desc' =>
      array (
        0 => 'TeX document',
      ),
      'e' =>
      array (
        0 => 'tex',
        1 => 'ltx',
        2 => 'sty',
        3 => 'cls',
        4 => 'dtx',
        5 => 'ins',
        6 => 'latex',
      ),
    ),
    'video/mp4' =>
    array (
      'a' =>
      array (
        0 => 'video/mp4v-es',
        1 => 'video/x-m4v',
      ),
      'desc' =>
      array (
        0 => 'MPEG-4 video',
      ),
      'e' =>
      array (
        0 => 'mp4',
        1 => 'mp4v',
        2 => 'mpg4',
        3 => 'm4v',
        4 => 'f4v',
        5 => 'lrv',
      ),
    ),
    'video/quicktime' =>
    array (
      'desc' =>
      array (
        0 => 'QuickTime video',
      ),
      'e' =>
      array (
        0 => 'qt',
        1 => 'mov',
        2 => 'moov',
        3 => 'qtvr',
      ),
    ),
    'video/webm' =>
    array (
      'desc' =>
      array (
        0 => 'WebM video',
      ),
      'e' =>
      array (
        0 => 'webm',
      ),
    ),
    'video/x-matroska' =>
    array (
      'desc' =>
      array (
        0 => 'Matroska video',
      ),
      'e' =>
      array (
        0 => 'mkv',
        1 => 'mk3d',
        2 => 'mks',
      ),
    ),
    'video/x-ms-wmv' =>
    array (
      'desc' =>
      array (
        0 => 'Windows Media video',
      ),
      'e' =>
      array (
        0 => 'wmv',
      ),
    ),
  ),
  'e' =>
  array (
    'ai' =>
    array (
      't' =>
      array (
        0 => 'application/postscript',
      ),
    ),
    'al' =>
    array (
      't' =>
      array (
        0 => 'application/x-perl',
      ),
    ),
    'apk' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.android.package-archive',
      ),
    ),
    'asc' =>
    array (
      't' =>
      array (
        0 => 'application/pgp-signature',
        1 => 'application/pgp-encrypted',
        2 => 'text/plain',
      ),
    ),
    'asf' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.ms-asf',
      ),
    ),
    'asx' =>
    array (
      't' =>
      array (
        0 => 'audio/x-ms-asx',
      ),
    ),
    'atom' =>
    array (
      't' =>
      array (
        0 => 'application/atom+xml',
      ),
    ),
    'bat' =>
    array (
      't' =>
      array (
        0 => 'application/x-msdownload',
      ),
    ),
    'bib' =>
    array (
      't' =>
      array (
        0 => 'text/x-bibtex',
      ),
    ),
    'bin' =>
    array (
      't' =>
      array (
        0 => 'application/octet-stream',
      ),
    ),
    'bmp' =>
    array (
      't' =>
      array (
        0 => 'image/bmp',
      ),
    ),
    'boz' =>
    array (
      't' =>
      array (
        0 => 'application/x-bzip',
      ),
    ),
    'bpk' =>
    array (
      't' =>
      array (
        0 => 'application/octet-stream',
      ),
    ),
    'bz' =>
    array (
      't' =>
      array (
        0 => 'application/x-bzip',
      ),
    ),
    'bz2' =>
    array (
      't' =>
      array (
        0 => 'application/x-bzip',
      ),
    ),
    'c' =>
    array (
      't' =>
      array (
        0 => 'text/x-c++src',
        1 => 'text/x-csrc',
      ),
    ),
    'c++' =>
    array (
      't' =>
      array (
        0 => 'text/x-c++src',
      ),
    ),
    'cc' =>
    array (
      't' =>
      array (
        0 => 'text/x-c++src',
      ),
    ),
    'cdf' =>
    array (
      't' =>
      array (
        0 => 'application/x-netcdf',
      ),
    ),
    'cls' =>
    array (
      't' =>
      array (
        0 => 'text/x-tex',
      ),
    ),
    'com' =>
    array (
      't' =>
      array (
        0 => 'application/x-msdownload',
      ),
    ),
    'conf' =>
    array (
      't' =>
      array (
        0 => 'text/plain',
      ),
    ),
    'cpp' =>
    array (
      't' =>
      array (
        0 => 'text/x-c++src',
      ),
    ),
    'css' =>
    array (
      't' =>
      array (
        0 => 'text/css',
      ),
    ),
    'csv' =>
    array (
      't' =>
      array (
        0 => 'text/csv',
      ),
    ),
    'cxx' =>
    array (
      't' =>
      array (
        0 => 'text/x-c++src',
      ),
    ),
    'deb' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.debian.binary-package',
      ),
    ),
    'def' =>
    array (
      't' =>
      array (
        0 => 'text/plain',
      ),
    ),
    'deploy' =>
    array (
      't' =>
      array (
        0 => 'application/octet-stream',
      ),
    ),
    'dib' =>
    array (
      't' =>
      array (
        0 => 'image/bmp',
      ),
    ),
    'dic' =>
    array (
      't' =>
      array (
        0 => 'text/x-csrc',
      ),
    ),
    'diff' =>
    array (
      't' =>
      array (
        0 => 'text/x-patch',
      ),
    ),
    'dist' =>
    array (
      't' =>
      array (
        0 => 'application/octet-stream',
      ),
    ),
    'distz' =>
    array (
      't' =>
      array (
        0 => 'application/octet-stream',
      ),
    ),
    'djv' =>
    array (
      't' =>
      array (
        0 => 'image/vnd.djvu',
      ),
    ),
    'djvu' =>
    array (
      't' =>
      array (
        0 => 'image/vnd.djvu',
      ),
    ),
    'dll' =>
    array (
      't' =>
      array (
        0 => 'application/x-msdownload',
      ),
    ),
    'dms' =>
    array (
      't' =>
      array (
        0 => 'application/octet-stream',
      ),
    ),
    'doc' =>
    array (
      't' =>
      array (
        0 => 'application/msword',
      ),
    ),
    'docm' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.ms-word.document.macroenabled.12',
      ),
    ),
    'docx' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
      ),
    ),
    'dot' =>
    array (
      't' =>
      array (
        0 => 'application/msword',
      ),
    ),
    'dsc' =>
    array (
      't' =>
      array (
        0 => 'text/prs.lines.tag',
      ),
    ),
    'dtx' =>
    array (
      't' =>
      array (
        0 => 'text/x-tex',
      ),
    ),
    'dump' =>
    array (
      't' =>
      array (
        0 => 'application/octet-stream',
      ),
    ),
    'dxf' =>
    array (
      't' =>
      array (
        0 => 'image/vnd.dxf',
      ),
    ),
    'elc' =>
    array (
      't' =>
      array (
        0 => 'application/octet-stream',
      ),
    ),
    'eml' =>
    array (
      't' =>
      array (
        0 => 'message/rfc822',
      ),
    ),
    'eps' =>
    array (
      't' =>
      array (
        0 => 'application/postscript',
      ),
    ),
    'epub' =>
    array (
      't' =>
      array (
        0 => 'application/epub+zip',
      ),
    ),
    'exe' =>
    array (
      't' =>
      array (
        0 => 'application/x-msdownload',
      ),
    ),
    'f4a' =>
    array (
      't' =>
      array (
        0 => 'audio/mp4',
      ),
    ),
    'f4v' =>
    array (
      't' =>
      array (
        0 => 'video/mp4',
      ),
    ),
    'gcrd' =>
    array (
      't' =>
      array (
        0 => 'text/vcard',
      ),
    ),
    'gem' =>
    array (
      't' =>
      array (
        0 => 'application/x-tar',
      ),
    ),
    'gif' =>
    array (
      't' =>
      array (
        0 => 'image/gif',
      ),
    ),
    'gpg' =>
    array (
      't' =>
      array (
        0 => 'application/pgp-encrypted',
        1 => 'application/pgp-signature',
      ),
    ),
    'gtar' =>
    array (
      't' =>
      array (
        0 => 'application/x-tar',
      ),
    ),
    'gz' =>
    array (
      't' =>
      array (
        0 => 'application/gzip',
      ),
    ),
    'h' =>
    array (
      't' =>
      array (
        0 => 'text/x-chdr',
      ),
    ),
    'h4' =>
    array (
      't' =>
      array (
        0 => 'application/x-hdf',
      ),
    ),
    'h5' =>
    array (
      't' =>
      array (
        0 => 'application/x-hdf',
      ),
    ),
    'hdf' =>
    array (
      't' =>
      array (
        0 => 'application/x-hdf',
      ),
    ),
    'hdf4' =>
    array (
      't' =>
      array (
        0 => 'application/x-hdf',
      ),
    ),
    'hdf5' =>
    array (
      't' =>
      array (
        0 => 'application/x-hdf',
      ),
    ),
    'htm' =>
    array (
      't' =>
      array (
        0 => 'text/html',
        1 => 'application/xhtml+xml',
      ),
    ),
    'html' =>
    array (
      't' =>
      array (
        0 => 'text/html',
        1 => 'application/xhtml+xml',
      ),
    ),
    'ico' =>
    array (
      't' =>
      array (
        0 => 'image/vnd.microsoft.icon',
      ),
    ),
    'ics' =>
    array (
      't' =>
      array (
        0 => 'text/calendar',
      ),
    ),
    'ifb' =>
    array (
      't' =>
      array (
        0 => 'text/calendar',
      ),
    ),
    'in' =>
    array (
      't' =>
      array (
        0 => 'text/plain',
      ),
    ),
    'ins' =>
    array (
      't' =>
      array (
        0 => 'text/x-tex',
      ),
    ),
    'jnlp' =>
    array (
      't' =>
      array (
        0 => 'application/x-java-jnlp-file',
      ),
    ),
    'jp2' =>
    array (
      't' =>
      array (
        0 => 'image/jp2',
      ),
    ),
    'jpe' =>
    array (
      't' =>
      array (
        0 => 'image/jpeg',
      ),
    ),
    'jpeg' =>
    array (
      't' =>
      array (
        0 => 'image/jpeg',
      ),
    ),
    'jpg' =>
    array (
      't' =>
      array (
        0 => 'image/jpeg',
      ),
    ),
    'jpg2' =>
    array (
      't' =>
      array (
        0 => 'image/jp2',
      ),
    ),
    'js' =>
    array (
      't' =>
      array (
        0 => 'application/javascript',
      ),
    ),
    'jsm' =>
    array (
      't' =>
      array (
        0 => 'application/javascript',
      ),
    ),
    'json' =>
    array (
      't' =>
      array (
        0 => 'application/json',
      ),
    ),
    'jsonld' =>
    array (
      't' =>
      array (
        0 => 'application/ld+json',
      ),
    ),
    'kar' =>
    array (
      't' =>
      array (
        0 => 'audio/midi',
      ),
    ),
    'kml' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.google-earth.kml+xml',
      ),
    ),
    'kmz' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.google-earth.kmz',
      ),
    ),
    'latex' =>
    array (
      't' =>
      array (
        0 => 'text/x-tex',
      ),
    ),
    'list' =>
    array (
      't' =>
      array (
        0 => 'text/plain',
      ),
    ),
    'log' =>
    array (
      't' =>
      array (
        0 => 'text/plain',
        1 => 'text/x-log',
      ),
    ),
    'lrf' =>
    array (
      't' =>
      array (
        0 => 'application/octet-stream',
      ),
    ),
    'lrv' =>
    array (
      't' =>
      array (
        0 => 'video/mp4',
      ),
    ),
    'ltx' =>
    array (
      't' =>
      array (
        0 => 'text/x-tex',
      ),
    ),
    'm' =>
    array (
      't' =>
      array (
        0 => 'text/x-matlab',
      ),
    ),
    'm2a' =>
    array (
      't' =>
      array (
        0 => 'audio/mpeg',
      ),
    ),
    'm3a' =>
    array (
      't' =>
      array (
        0 => 'audio/mpeg',
      ),
    ),
    'm3u' =>
    array (
      't' =>
      array (
        0 => 'audio/x-mpegurl',
      ),
    ),
    'm3u8' =>
    array (
      't' =>
      array (
        0 => 'audio/x-mpegurl',
      ),
    ),
    'm4a' =>
    array (
      't' =>
      array (
        0 => 'audio/mp4',
      ),
    ),
    'm4v' =>
    array (
      't' =>
      array (
        0 => 'video/mp4',
      ),
    ),
    'man' =>
    array (
      't' =>
      array (
        0 => 'text/troff',
        1 => 'application/x-troff-man',
      ),
    ),
    'mar' =>
    array (
      't' =>
      array (
        0 => 'application/octet-stream',
      ),
    ),
    'mbox' =>
    array (
      't' =>
      array (
        0 => 'application/mbox',
      ),
    ),
    'me' =>
    array (
      't' =>
      array (
        0 => 'text/troff',
      ),
    ),
    'mid' =>
    array (
      't' =>
      array (
        0 => 'audio/midi',
      ),
    ),
    'midi' =>
    array (
      't' =>
      array (
        0 => 'audio/midi',
      ),
    ),
    'mime' =>
    array (
      't' =>
      array (
        0 => 'message/rfc822',
      ),
    ),
    'mjs' =>
    array (
      't' =>
      array (
        0 => 'application/javascript',
      ),
    ),
    'mk3d' =>
    array (
      't' =>
      array (
        0 => 'video/x-matroska',
      ),
    ),
    'mks' =>
    array (
      't' =>
      array (
        0 => 'video/x-matroska',
      ),
    ),
    'mkv' =>
    array (
      't' =>
      array (
        0 => 'video/x-matroska',
      ),
    ),
    'mobi' =>
    array (
      't' =>
      array (
        0 => 'application/x-mobipocket-ebook',
      ),
    ),
    'moov' =>
    array (
      't' =>
      array (
        0 => 'video/quicktime',
      ),
    ),
    'mov' =>
    array (
      't' =>
      array (
        0 => 'video/quicktime',
      ),
    ),
    'mp2' =>
    array (
      't' =>
      array (
        0 => 'audio/mpeg',
      ),
    ),
    'mp2a' =>
    array (
      't' =>
      array (
        0 => 'audio/mpeg',
      ),
    ),
    'mp3' =>
    array (
      't' =>
      array (
        0 => 'audio/mpeg',
      ),
    ),
    'mp4' =>
    array (
      't' =>
      array (
        0 => 'video/mp4',
      ),
    ),
    'mp4a' =>
    array (
      't' =>
      array (
        0 => 'audio/mp4',
      ),
    ),
    'mp4v' =>
    array (
      't' =>
      array (
        0 => 'video/mp4',
      ),
    ),
    'mpg4' =>
    array (
      't' =>
      array (
        0 => 'video/mp4',
      ),
    ),
    'mpga' =>
    array (
      't' =>
      array (
        0 => 'audio/mpeg',
      ),
    ),
    'mrc' =>
    array (
      't' =>
      array (
        0 => 'application/marc',
      ),
    ),
    'ms' =>
    array (
      't' =>
      array (
        0 => 'text/troff',
      ),
    ),
    'msi' =>
    array (
      't' =>
      array (
        0 => 'application/x-msdownload',
      ),
    ),
    'nc' =>
    array (
      't' =>
      array (
        0 => 'application/x-netcdf',
      ),
    ),
    'odt' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.oasis.opendocument.text',
      ),
    ),
    'owl' =>
    array (
      't' =>
      array (
        0 => 'application/rdf+xml',
      ),
    ),
    'p7s' =>
    array (
      't' =>
      array (
        0 => 'application/pkcs7-signature',
      ),
    ),
    'patch' =>
    array (
      't' =>
      array (
        0 => 'text/x-patch',
      ),
    ),
    'pdf' =>
    array (
      't' =>
      array (
        0 => 'application/pdf',
      ),
    ),
    'perl' =>
    array (
      't' =>
      array (
        0 => 'application/x-perl',
      ),
    ),
    'pgp' =>
    array (
      't' =>
      array (
        0 => 'application/pgp-encrypted',
        1 => 'application/pgp-signature',
      ),
    ),
    'pkg' =>
    array (
      't' =>
      array (
        0 => 'application/octet-stream',
      ),
    ),
    'pl' =>
    array (
      't' =>
      array (
        0 => 'application/x-perl',
      ),
    ),
    'pls' =>
    array (
      't' =>
      array (
        0 => 'audio/x-scpls',
      ),
    ),
    'pm' =>
    array (
      't' =>
      array (
        0 => 'application/x-perl',
      ),
    ),
    'png' =>
    array (
      't' =>
      array (
        0 => 'image/png',
      ),
    ),
    'pod' =>
    array (
      't' =>
      array (
        0 => 'application/x-perl',
      ),
    ),
    'pot' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.ms-powerpoint',
      ),
    ),
    'pps' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.ms-powerpoint',
      ),
    ),
    'ppt' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.ms-powerpoint',
      ),
    ),
    'pptx' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
      ),
    ),
    'ppz' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.ms-powerpoint',
      ),
    ),
    'prc' =>
    array (
      't' =>
      array (
        0 => 'application/x-mobipocket-ebook',
      ),
    ),
    'ps' =>
    array (
      't' =>
      array (
        0 => 'application/postscript',
      ),
    ),
    'py' =>
    array (
      't' =>
      array (
        0 => 'text/x-python',
      ),
    ),
    'pyx' =>
    array (
      't' =>
      array (
        0 => 'text/x-python',
      ),
    ),
    'qt' =>
    array (
      't' =>
      array (
        0 => 'video/quicktime',
      ),
    ),
    'qtvr' =>
    array (
      't' =>
      array (
        0 => 'video/quicktime',
      ),
    ),
    'ra' =>
    array (
      't' =>
      array (
        0 => 'audio/vnd.rn-realaudio',
      ),
    ),
    'rar' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.rar',
      ),
    ),
    'rax' =>
    array (
      't' =>
      array (
        0 => 'audio/vnd.rn-realaudio',
      ),
    ),
    'rdf' =>
    array (
      't' =>
      array (
        0 => 'application/rdf+xml',
      ),
    ),
    'rdfs' =>
    array (
      't' =>
      array (
        0 => 'application/rdf+xml',
      ),
    ),
    'ris' =>
    array (
      't' =>
      array (
        0 => 'application/x-research-info-systems',
      ),
    ),
    'rmi' =>
    array (
      't' =>
      array (
        0 => 'audio/midi',
      ),
    ),
    'rng' =>
    array (
      't' =>
      array (
        0 => 'application/xml',
      ),
    ),
    'roff' =>
    array (
      't' =>
      array (
        0 => 'text/troff',
      ),
    ),
    'rss' =>
    array (
      't' =>
      array (
        0 => 'application/rss+xml',
      ),
    ),
    'rtf' =>
    array (
      't' =>
      array (
        0 => 'application/rtf',
      ),
    ),
    'sh' =>
    array (
      't' =>
      array (
        0 => 'application/x-sh',
      ),
    ),
    'sig' =>
    array (
      't' =>
      array (
        0 => 'application/pgp-signature',
      ),
    ),
    'so' =>
    array (
      't' =>
      array (
        0 => 'application/octet-stream',
      ),
    ),
    'spl' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.adobe.flash.movie',
      ),
    ),
    'src' =>
    array (
      't' =>
      array (
        0 => 'application/x-wais-source',
      ),
    ),
    'sty' =>
    array (
      't' =>
      array (
        0 => 'text/x-tex',
      ),
    ),
    'svg' =>
    array (
      't' =>
      array (
        0 => 'image/svg+xml',
      ),
    ),
    'svgz' =>
    array (
      't' =>
      array (
        0 => 'image/svg+xml',
      ),
    ),
    'swf' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.adobe.flash.movie',
      ),
    ),
    't' =>
    array (
      't' =>
      array (
        0 => 'text/troff',
        1 => 'application/x-perl',
      ),
    ),
    'tar' =>
    array (
      't' =>
      array (
        0 => 'application/x-tar',
      ),
    ),
    'tex' =>
    array (
      't' =>
      array (
        0 => 'text/x-tex',
      ),
    ),
    'text' =>
    array (
      't' =>
      array (
        0 => 'text/plain',
      ),
    ),
    'tif' =>
    array (
      't' =>
      array (
        0 => 'image/tiff',
      ),
    ),
    'tiff' =>
    array (
      't' =>
      array (
        0 => 'image/tiff',
      ),
    ),
    'torrent' =>
    array (
      't' =>
      array (
        0 => 'application/x-bittorrent',
      ),
    ),
    'tr' =>
    array (
      't' =>
      array (
        0 => 'text/troff',
      ),
    ),
    'tsv' =>
    array (
      't' =>
      array (
        0 => 'text/tab-separated-values',
      ),
    ),
    'ttl' =>
    array (
      't' =>
      array (
        0 => 'text/turtle',
      ),
    ),
    'txt' =>
    array (
      't' =>
      array (
        0 => 'text/plain',
      ),
    ),
    'udeb' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.debian.binary-package',
      ),
    ),
    'vcard' =>
    array (
      't' =>
      array (
        0 => 'text/vcard',
      ),
    ),
    'vcf' =>
    array (
      't' =>
      array (
        0 => 'text/vcard',
      ),
    ),
    'vcs' =>
    array (
      't' =>
      array (
        0 => 'text/calendar',
      ),
    ),
    'vct' =>
    array (
      't' =>
      array (
        0 => 'text/vcard',
      ),
    ),
    'vlc' =>
    array (
      't' =>
      array (
        0 => 'audio/x-mpegurl',
      ),
    ),
    'vtt' =>
    array (
      't' =>
      array (
        0 => 'text/vtt',
      ),
    ),
    'wav' =>
    array (
      't' =>
      array (
        0 => 'audio/x-wav',
      ),
    ),
    'wax' =>
    array (
      't' =>
      array (
        0 => 'audio/x-ms-asx',
      ),
    ),
    'webm' =>
    array (
      't' =>
      array (
        0 => 'video/webm',
      ),
    ),
    'webp' =>
    array (
      't' =>
      array (
        0 => 'image/webp',
      ),
    ),
    'wm' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.ms-asf',
      ),
    ),
    'wml' =>
    array (
      't' =>
      array (
        0 => 'text/vnd.wap.wml',
      ),
    ),
    'wmv' =>
    array (
      't' =>
      array (
        0 => 'video/x-ms-wmv',
      ),
    ),
    'wmx' =>
    array (
      't' =>
      array (
        0 => 'audio/x-ms-asx',
      ),
    ),
    'wsgi' =>
    array (
      't' =>
      array (
        0 => 'text/x-python',
      ),
    ),
    'wvx' =>
    array (
      't' =>
      array (
        0 => 'audio/x-ms-asx',
      ),
    ),
    'xbl' =>
    array (
      't' =>
      array (
        0 => 'application/xml',
      ),
    ),
    'xht' =>
    array (
      't' =>
      array (
        0 => 'application/xhtml+xml',
      ),
    ),
    'xhtml' =>
    array (
      't' =>
      array (
        0 => 'application/xhtml+xml',
      ),
    ),
    'xla' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.ms-excel',
      ),
    ),
    'xlc' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.ms-excel',
      ),
    ),
    'xld' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.ms-excel',
      ),
    ),
    'xll' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.ms-excel',
      ),
    ),
    'xlm' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.ms-excel',
      ),
    ),
    'xls' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.ms-excel',
      ),
    ),
    'xlsx' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
      ),
    ),
    'xlt' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.ms-excel',
      ),
    ),
    'xlw' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.ms-excel',
      ),
    ),
    'xml' =>
    array (
      't' =>
      array (
        0 => 'application/xml',
      ),
    ),
    'xsd' =>
    array (
      't' =>
      array (
        0 => 'application/xml',
      ),
    ),
    'xsl' =>
    array (
      't' =>
      array (
        0 => 'application/xml',
      ),
    ),
    'xz' =>
    array (
      't' =>
      array (
        0 => 'application/x-xz',
      ),
    ),
    'zip' =>
    array (
      't' =>
      array (
        0 => 'application/zip',
      ),
    ),
    'zipx' =>
    array (
      't' =>
      array (
        0 => 'application/zip',
      ),
    ),
    'zst' =>
    array (
      't' =>
      array (
        0 => 'application/zstd',
      ),
    ),
    'zz' =>
    array (
      't' =>
      array (
        0 => 'application/zlib',
      ),
    ),
  ),
  'a' =>
  array (
    'application/acrobat' =>
    array (
      't' =>
      array (
        0 => 'application/pdf',
      ),
    ),
    'application/bzip2' =>
    array (
      't' =>
      array (
        0 => 'application/x-bzip',
      ),
    ),
    'application/futuresplash' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.adobe.flash.movie',
      ),
    ),
    'application/ico' =>
    array (
      't' =>
      array (
        0 => 'image/vnd.microsoft.icon',
      ),
    ),
    'application/ics' =>
    array (
      't' =>
      array (
        0 => 'text/calendar',
      ),
    ),
    'application/m3u' =>
    array (
      't' =>
      array (
        0 => 'audio/x-mpegurl',
      ),
    ),
    'application/msexcel' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.ms-excel',
      ),
    ),
    'application/mspowerpoint' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.ms-powerpoint',
      ),
    ),
    'application/nappdf' =>
    array (
      't' =>
      array (
        0 => 'application/pdf',
      ),
    ),
    'application/pgp' =>
    array (
      't' =>
      array (
        0 => 'application/pgp-encrypted',
      ),
    ),
    'application/pls' =>
    array (
      't' =>
      array (
        0 => 'audio/x-scpls',
      ),
    ),
    'application/powerpoint' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.ms-powerpoint',
      ),
    ),
    'application/vnd.ms-word' =>
    array (
      't' =>
      array (
        0 => 'application/msword',
      ),
    ),
    'application/x-bzip2' =>
    array (
      't' =>
      array (
        0 => 'application/x-bzip',
      ),
    ),
    'application/x-deb' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.debian.binary-package',
      ),
    ),
    'application/x-debian-package' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.debian.binary-package',
      ),
    ),
    'application/x-gtar' =>
    array (
      't' =>
      array (
        0 => 'application/x-tar',
      ),
    ),
    'application/x-gzip' =>
    array (
      't' =>
      array (
        0 => 'application/gzip',
      ),
    ),
    'application/x-javascript' =>
    array (
      't' =>
      array (
        0 => 'application/javascript',
      ),
    ),
    'application/x-ms-asx' =>
    array (
      't' =>
      array (
        0 => 'audio/x-ms-asx',
      ),
    ),
    'application/x-msexcel' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.ms-excel',
      ),
    ),
    'application/x-mspowerpoint' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.ms-powerpoint',
      ),
    ),
    'application/x-msword' =>
    array (
      't' =>
      array (
        0 => 'application/msword',
      ),
    ),
    'application/x-pdf' =>
    array (
      't' =>
      array (
        0 => 'application/pdf',
      ),
    ),
    'application/x-rar' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.rar',
      ),
    ),
    'application/x-rar-compressed' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.rar',
      ),
    ),
    'application/x-shockwave-flash' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.adobe.flash.movie',
      ),
    ),
    'application/x-tex' =>
    array (
      't' =>
      array (
        0 => 'text/x-tex',
      ),
    ),
    'application/x-troff' =>
    array (
      't' =>
      array (
        0 => 'text/troff',
      ),
    ),
    'application/x-zip' =>
    array (
      't' =>
      array (
        0 => 'application/zip',
      ),
    ),
    'application/x-zip-compressed' =>
    array (
      't' =>
      array (
        0 => 'application/zip',
      ),
    ),
    'audio/m3u' =>
    array (
      't' =>
      array (
        0 => 'audio/x-mpegurl',
      ),
    ),
    'audio/m4a' =>
    array (
      't' =>
      array (
        0 => 'audio/mp4',
      ),
    ),
    'audio/mp3' =>
    array (
      't' =>
      array (
        0 => 'audio/mpeg',
      ),
    ),
    'audio/mpegurl' =>
    array (
      't' =>
      array (
        0 => 'audio/x-mpegurl',
      ),
    ),
    'audio/scpls' =>
    array (
      't' =>
      array (
        0 => 'audio/x-scpls',
      ),
    ),
    'audio/vnd.m-realaudio' =>
    array (
      't' =>
      array (
        0 => 'audio/vnd.rn-realaudio',
      ),
    ),
    'audio/vnd.wave' =>
    array (
      't' =>
      array (
        0 => 'audio/x-wav',
      ),
    ),
    'audio/wav' =>
    array (
      't' =>
      array (
        0 => 'audio/x-wav',
      ),
    ),
    'audio/x-m3u' =>
    array (
      't' =>
      array (
        0 => 'audio/x-mpegurl',
      ),
    ),
    'audio/x-m4a' =>
    array (
      't' =>
      array (
        0 => 'audio/mp4',
      ),
    ),
    'audio/x-midi' =>
    array (
      't' =>
      array (
        0 => 'audio/midi',
      ),
    ),
    'audio/x-mp3' =>
    array (
      't' =>
      array (
        0 => 'audio/mpeg',
      ),
    ),
    'audio/x-mp3-playlist' =>
    array (
      't' =>
      array (
        0 => 'audio/x-mpegurl',
      ),
    ),
    'audio/x-mpeg' =>
    array (
      't' =>
      array (
        0 => 'audio/mpeg',
      ),
    ),
    'audio/x-mpg' =>
    array (
      't' =>
      array (
        0 => 'audio/mpeg',
      ),
    ),
    'audio/x-pn-realaudio' =>
    array (
      't' =>
      array (
        0 => 'audio/vnd.rn-realaudio',
      ),
    ),
    'image/ico' =>
    array (
      't' =>
      array (
        0 => 'image/vnd.microsoft.icon',
      ),
    ),
    'image/icon' =>
    array (
      't' =>
      array (
        0 => 'image/vnd.microsoft.icon',
      ),
    ),
    'image/jpeg2000' =>
    array (
      't' =>
      array (
        0 => 'image/jp2',
      ),
    ),
    'image/jpeg2000-image' =>
    array (
      't' =>
      array (
        0 => 'image/jp2',
      ),
    ),
    'image/pdf' =>
    array (
      't' =>
      array (
        0 => 'application/pdf',
      ),
    ),
    'image/pjpeg' =>
    array (
      't' =>
      array (
        0 => 'image/jpeg',
      ),
    ),
    'image/x-bmp' =>
    array (
      't' =>
      array (
        0 => 'image/bmp',
      ),
    ),
    'image/x-djvu' =>
    array (
      't' =>
      array (
        0 => 'image/vnd.djvu',
      ),
    ),
    'image/x-ico' =>
    array (
      't' =>
      array (
        0 => 'image/vnd.microsoft.icon',
      ),
    ),
    'image/x-icon' =>
    array (
      't' =>
      array (
        0 => 'image/vnd.microsoft.icon',
      ),
    ),
    'image/x-jpeg2000-image' =>
    array (
      't' =>
      array (
        0 => 'image/jp2',
      ),
    ),
    'image/x-ms-bmp' =>
    array (
      't' =>
      array (
        0 => 'image/bmp',
      ),
    ),
    'image/x.djvu' =>
    array (
      't' =>
      array (
        0 => 'image/vnd.djvu',
      ),
    ),
    'text/directory' =>
    array (
      't' =>
      array (
        0 => 'text/vcard',
      ),
    ),
    'text/ico' =>
    array (
      't' =>
      array (
        0 => 'image/vnd.microsoft.icon',
      ),
    ),
    'text/javascript' =>
    array (
      't' =>
      array (
        0 => 'application/javascript',
      ),
    ),
    'text/rdf' =>
    array (
      't' =>
      array (
        0 => 'application/rdf+xml',
      ),
    ),
    'text/rss' =>
    array (
      't' =>
      array (
        0 => 'application/rss+xml',
      ),
    ),
    'text/rtf' =>
    array (
      't' =>
      array (
        0 => 'application/rtf',
      ),
    ),
    'text/x-c' =>
    array (
      't' =>
      array (
        0 => 'text/x-csrc',
      ),
    ),
    'text/x-comma-separated-values' =>
    array (
      't' =>
      array (
        0 => 'text/csv',
      ),
    ),
    'text/x-csv' =>
    array (
      't' =>
      array (
        0 => 'text/csv',
      ),
    ),
    'text/x-diff' =>
    array (
      't' =>
      array (
        0 => 'text/x-patch',
      ),
    ),
    'text/x-octave' =>
    array (
      't' =>
      array (
        0 => 'text/x-matlab',
      ),
    ),
    'text/x-perl' =>
    array (
      't' =>
      array (
        0 => 'application/x-perl',
      ),
    ),
    'text/x-troff' =>
    array (
      't' =>
      array (
        0 => 'text/troff',
      ),
    ),
    'text/x-vcalendar' =>
    array (
      't' =>
      array (
        0 => 'text/calendar',
      ),
    ),
    'text/x-vcard' =>
    array (
      't' =>
      array (
        0 => 'text/vcard',
      ),
    ),
    'text/xml' =>
    array (
      't' =>
      array (
        0 => 'application/xml',
      ),
    ),
    'video/mp4v-es' =>
    array (
      't' =>
      array (
        0 => 'video/mp4',
      ),
    ),
    'video/x-m4v' =>
    array (
      't' =>
      array (
        0 => 'video/mp4',
      ),
    ),
    'video/x-ms-asf' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.ms-asf',
      ),
    ),
    'video/x-ms-asf-plugin' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.ms-asf',
      ),
    ),
    'video/x-ms-wax' =>
    array (
      't' =>
      array (
        0 => 'audio/x-ms-asx',
      ),
    ),
    'video/x-ms-wm' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.ms-asf',
      ),
    ),
    'video/x-ms-wmx' =>
    array (
      't' =>
      array (
        0 => 'audio/x-ms-asx',
      ),
    ),
    'video/x-ms-wvx' =>
    array (
      't' =>
      array (
        0 => 'audio/x-ms-asx',
      ),
    ),
    'zz-application/zz-winassoc-doc' =>
    array (
      't' =>
      array (
        0 => 'application/msword',
      ),
    ),
    'zz-application/zz-winassoc-xls' =>
    array (
      't' =>
      array (
        0 => 'application/vnd.ms-excel',
      ),
    ),
  ),
);
    // phpcs:enable
}
