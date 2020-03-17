<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
	<channel>
		<title>Waspada Covid-19</title>
		<link>https://covid.fullstack.id</link>
		<description>Monitoring kasus covid-19 di daerah</description>
		<image>
		    <title>Waspada Covid-19</title>
		    <link>https://covid.fullstack.id</link>
			<url>https://yogasukma.web.id/wp-content/uploads/2016/12/File0315-copy-3-1.jpg</url>
        </image>
        @foreach($news as $item)
            <item>
                <title><![CDATA[{{ "[" . @$item->regional . "] " . $item->title }}]]></title>
                <link>{{ $item->link }}</link>
                <guid>{{ $item->guid }}</guid>
                <pubDate>{{ $item->published_at_feeds_format }}</pubDate>
                <description><![CDATA[{{ $item->description }} <a href='{{ $item->link . "?source=covid.fullstack.id" }}'>Selengkapnya</a>]]></description>
                @if(!is_null($item->thumbnail))
                    <enclosure url="{{ $item->thumbnail }}" type="image/jpeg" />
                @endif
            </item>
        @endforeach
	</channel>
</rss>
