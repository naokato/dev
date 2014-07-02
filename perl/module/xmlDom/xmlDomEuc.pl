#!/usr/bin/perl
use strict;
use warnings;
use XML::DOM;

# can use euc-jp in XML
my $xml = <<'EOF';
<?xml version="1.0" encoding="euc-jp"?>
<allinfo>
    <data>
        <namel>����</namel>
        <namef>ã��</namef>
        <soubi>
            <buki>douno tsurugi</buki>
            <bougu>kawano huku</bougu>
        </soubi>
    </data>
    <data>
        <namel>��ƣ</namel>
        <namef>����</namef>
        <soubi>
            <buki>kino bou</buki>
            <bougu>onabeno huta</bougu>
        </soubi>
    </data>
</allinfo>
EOF

my $parser = new XML::DOM::Parser;
my $doc = $parser->parse($xml);
#print $doc->toString;

my $node = $doc->getElementsByTagName("allinfo")->item(0);
print $node->toString;
