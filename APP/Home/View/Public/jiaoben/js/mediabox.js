var Mediabox;
(function() {
    var A, h, P, H, O, n, F, l, m, k, J, y, t, z = new Image(), V = new Image(), r = false, w = false, S, b, j, c, U, E, M, T, W, e, D, Q, G, x, B, o, i = "none", f, d = "mediaBox", C;
    window.addEvent("domready", function() {
        document.id(document.body).adopt($$([S = new Element("div", {id: "mbOverlay"}).addEvent("click", N), b = new Element("div", {id: "mbCenter"})]).setStyle("display", "none"));
        j = new Element("div", {id: "mbImage"}).injectInside(b);
        c = new Element("div", {id: "mbBottom"}).injectInside(b).adopt(new Element("a", {id: "mbCloseLink", href: "#"}).addEvent("click", N), e = new Element("a", {id: "mbNextLink", href: "#"}).addEvent("click", g), T = new Element("a", {id: "mbPrevLink", href: "#"}).addEvent("click", K), E = new Element("div", {id: "mbTitle"}), W = new Element("div", {id: "mbNumber"}), M = new Element("div", {id: "mbCaption"}));
        y = {overlay: new Fx.Tween(S, {property: "opacity", duration: 360}).set(0), image: new Fx.Tween(j, {property: "opacity", duration: 360, onComplete: I}), bottom: new Fx.Tween(c, {property: "opacity", duration: 240}).set(0)}
    });
    Mediabox = {close: function() {
            N()
        }, open: function(Z, Y, X) {
            A = $extend({loop: false, keyboard: true, alpha: true, stopKey: false, overlayOpacity: 0.7, resizeOpening: true, resizeDuration: 240, resizeTransition: false, initialWidth: 320, initialHeight: 180, defaultWidth: 640, defaultHeight: 360, showCaption: true, showCounter: true, counterText: "{x} // {y}", imgBackground: false, imgPadding: 70, scriptaccess: "true", fullscreen: "true", fullscreenNum: "1", autoplay: "true", autoplayNum: "1", autoplayYes: "yes", volume: "100", medialoop: "true", bgcolor: "#000000", wmode: "opaque", useNB: true, playerpath: "plugins/mediabox/NonverBlaster.swf", controlColor: "0xFFFFFF", controlBackColor: "0x000000", showTimecode: "false", JWplayerpath: "plugins/mediabox/player.swf", backcolor: "000000", frontcolor: "999999", lightcolor: "000000", screencolor: "000000", controlbar: "over", controller: "true", flInfo: "true", revverID: "187866", revverFullscreen: "true", revverBack: "000000", revverFront: "ffffff", revverGrad: "000000", usViewers: "true", ytBorder: "0", ytColor1: "000000", ytColor2: "333333", ytQuality: "&ap=%2526fmt%3D18", ytRel: "0", ytInfo: "1", ytSearch: "0", vuPlayer: "basic", vmTitle: "1", vmByline: "1", vmPortrait: "1", vmColor: "ffffff"}, X || {});
            if ((Browser.Engine.gecko) && (Browser.Engine.version < 19)) {
                r = true;
                A.overlayOpacity = 1;
                S.className = "mbOverlayFF"
            }
            if (typeof Z == "string") {
                Z = [[Z, Y, X]];
                Y = 0
            }
            h = Z;
            A.loop = A.loop && (h.length > 1);
            if ((Browser.Engine.trident) && (Browser.Engine.version < 5)) {
                w = true;
                S.className = "mbOverlayIE";
                S.setStyle("position", "absolute");
                L()
            }
            q();
            s(true);
            n = window.getScrollTop() + (window.getHeight() / 2);
            l = window.getScrollLeft() + (window.getWidth() / 2);
            y.resize = new Fx.Morph(b, $extend({duration: A.resizeDuration, onComplete: R}, A.resizeTransition ? {transition: A.resizeTransition} : {}));
            b.setStyles({top: n, left: l, width: A.initialWidth, height: A.initialHeight, marginTop: -(A.initialHeight / 2), marginLeft: -(A.initialWidth / 2), display: ""});
            y.overlay.start(A.overlayOpacity);
            return a(Y)
        }};
    Element.implement({mediabox: function(X, Y) {
            $$(this).mediabox(X, Y);
            return this
        }});
    Elements.implement({mediabox: function(X, aa, Z) {
            aa = aa || function(ab) {
                x = ab.rel.split(/[\[\]]/);
                x = x[1];
                return[ab.href, ab.title, x]
            };
            Z = Z || function() {
                return true
            };
            var Y = this;
            Y.removeEvents("click").addEvent("click", function() {
                var ac = Y.filter(Z, this);
                var ad = [];
                var ab = [];
                ac.each(function(af, ae) {
                    if (ab.indexOf(af.toString()) < 0) {
                        ad.include(ac[ae]);
                        ab.include(ac[ae].toString())
                    }
                });
                return Mediabox.open(ad.map(aa), ab.indexOf(this.toString()), X)
            });
            return Y
        }});
    function L() {
        S.setStyles({top: window.getScrollTop(), left: window.getScrollLeft()})
    }
    function q() {
        k = window.getWidth();
        J = window.getHeight();
        S.setStyles({width: k, height: J})
    }
    function s(X) {
        if (Browser.Engine.gecko) {
            ["object", window.ie ? "select" : "embed"].forEach(function(Z) {
                Array.forEach(document.getElementsByTagName(Z), function(aa) {
                    if (X) {
                        aa._mediabox = aa.style.visibility
                    }
                    aa.style.visibility = X ? "hidden" : aa._mediabox
                })
            })
        }
        S.style.display = X ? "" : "none";
        var Y = X ? "addEvent" : "removeEvent";
        if (w) {
            window[Y]("scroll", L)
        }
        window[Y]("resize", q);
        if (A.keyboard) {
            document[Y]("keydown", u)
        }
    }
    function u(X) {
        if (A.alpha) {
            switch (X.code) {
                case 27:
                case 88:
                case 67:
                    N();
                    break;
                case 37:
                case 80:
                    K();
                    break;
                case 39:
                case 78:
                    g()
                }
        } else {
            switch (X.code) {
                case 27:
                    N();
                    break;
                case 37:
                    K();
                    break;
                case 39:
                    g()
                }
        }
        if (A.stopKey) {
            return false
        }
    }
    function K() {
        return a(H)
    }
    function g() {
        return a(O)
    }
    function a(X) {
        if (X >= 0) {
            j.set("html", "");
            P = X;
            H = ((P || !A.loop) ? P : h.length) - 1;
            O = P + 1;
            if (O == h.length) {
                O = A.loop ? 0 : -1
            }
            v();
            b.className = "mbLoading";
            if (!h[X][2]) {
                h[X][2] = ""
            }
            Q = h[X][2].split(" ");
            G = Q.length;
            if (G > 1) {
                B = (Q[G - 2].match("%")) ? (window.getWidth() * ((Q[G - 2].replace("%", "")) * 0.01)) + "px" : Q[G - 2] + "px";
                o = (Q[G - 1].match("%")) ? (window.getHeight() * ((Q[G - 1].replace("%", "")) * 0.01)) + "px" : Q[G - 1] + "px"
            } else {
                B = "";
                o = ""
            }
            D = h[X][0];
            U = h[P][1].split("::");
            if (D.match(/quietube\.com/i)) {
                f = D.split("v.php/");
                D = f[1]
            } else {
                if (D.match(/\/\/yfrog/i)) {
                    i = (D.substring(D.length - 1));
                    if (i.match(/b|g|j|p|t/i)) {
                        i = "image"
                    }
                    if (i == "s") {
                        i = "flash"
                    }
                    if (i.match(/f|z/i)) {
                        i = "video"
                    }
                    D = D + ":iphone"
                }
            }
            if (D.match(/\.gif|\.jpg|\.jpeg|\.png|twitpic\.com/i) || i == "image") {
                i = "img";
                D = D.replace(/twitpic\.com/i, "twitpic.com/show/full");
                t = new Image();
                t.onload = p;
                t.src = D
            } else {
                if (D.match(/\.flv|\.mp4/i) || i == "video") {
                    var Y = new URI(D);
                    D = "../../" + Y.toRelative();
                    i = "obj";
                    B = B || A.defaultWidth;
                    o = o || A.defaultHeight;
                    if (A.useNB) {
                        t = new Swiff("" + A.playerpath + "?mediaURL=" + D + "&allowSmoothing=true&autoPlay=" + A.autoplay + "&buffer=6&showTimecode=" + A.showTimecode + "&loop=" + A.medialoop + "&controlColor=" + A.controlColor + "&controlBackColor=" + A.controlBackColor + "&defaultVolume=" + A.volume + "&scaleIfFullScreen=true&showScalingButton=true&crop=false", {id: "MediaboxSWF", width: B, height: o, params: {wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen}})
                    } else {
                        t = new Swiff("" + A.JWplayerpath + "?file=" + D + "&backcolor=" + A.backcolor + "&frontcolor=" + A.frontcolor + "&lightcolor=" + A.lightcolor + "&screencolor=" + A.screencolor + "&autostart=" + A.autoplay + "&controlbar=" + A.controlbar, {id: "MediaboxSWF", width: B, height: o, params: {wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen}})
                    }
                    p()
                } else {
                    if (D.match(/\.mp3|\.aac|tweetmic\.com|tmic\.fm/i) || i == "audio") {
                        var Y = new URI(D);
                        D = "../../" + Y.toRelative();
                        i = "obj";
                        B = B || A.defaultWidth;
                        o = o || "20px";
                        if (D.match(/tweetmic\.com|tmic\.fm/i)) {
                            D = D.split("/");
                            D[4] = D[4] || D[3];
                            D = "http://media4.fjarnet.net/tweet/tweetmicapp-" + D[4] + ".mp3"
                        }
                        if (A.useNB) {
                            t = new Swiff("" + A.playerpath + "?mediaURL=" + D + "&allowSmoothing=true&autoPlay=" + A.autoplay + "&buffer=6&showTimecode=" + A.showTimecode + "&loop=" + A.medialoop + "&controlColor=" + A.controlColor + "&controlBackColor=" + A.controlBackColor + "&defaultVolume=" + A.volume + "&scaleIfFullScreen=true&showScalingButton=true&crop=false", {id: "MediaboxSWF", width: B, height: o, params: {wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen}})
                        } else {
                            t = new Swiff("" + A.JWplayerpath + "?file=" + D + "&backcolor=" + A.backcolor + "&frontcolor=" + A.frontcolor + "&lightcolor=" + A.lightcolor + "&screencolor=" + A.screencolor + "&autostart=" + A.autoplay, {id: "MediaboxSWF", width: B, height: o, params: {wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen}})
                        }
                        p()
                    } else {
                        if (D.match(/\.swf/i) || i == "flash") {
                            i = "obj";
                            B = B || A.defaultWidth;
                            o = o || A.defaultHeight;
                            t = new Swiff(D, {id: "MediaboxSWF", width: B, height: o, params: {wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen}});
                            p()
                        } else {
                            if (D.match(/\.mov|\.m4v|\.m4a|\.aiff|\.avi|\.caf|\.dv|\.mid|\.m3u|\.mp3|\.mp2|\.mp4|\.qtz/i) || i == "qt") {
                                i = "qt";
                                B = B || A.defaultWidth;
                                o = (parseInt(o) + 16) + "px" || A.defaultHeight;
                                t = new Quickie(D, {id: "MediaboxQT", width: B, height: o, container: "mbImage", attributes: {controller: A.controller, autoplay: A.autoplay, volume: A.volume, loop: A.medialoop, bgcolor: A.bgcolor}});
                                p()
                            } else {
                                if (D.match(/blip\.tv/i)) {
                                    i = "obj";
                                    B = B || "640px";
                                    o = o || "390px";
                                    t = new Swiff(D, {src: D, width: B, height: o, params: {wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen}});
                                    p()
                                } else {
                                    if (D.match(/break\.com/i)) {
                                        i = "obj";
                                        B = B || "464px";
                                        o = o || "376px";
                                        d = D.match(/\d{6}/g);
                                        t = new Swiff("http://embed.break.com/" + d, {width: B, height: o, params: {wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen}});
                                        p()
                                    } else {
                                        if (D.match(/dailymotion\.com/i)) {
                                            i = "obj";
                                            B = B || "480px";
                                            o = o || "381px";
                                            t = new Swiff(D, {id: d, width: B, height: o, params: {wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen}});
                                            p()
                                        } else {
                                            if (D.match(/facebook\.com/i)) {
                                                i = "obj";
                                                B = B || "320px";
                                                o = o || "240px";
                                                f = D.split("v=");
                                                f = f[1].split("&");
                                                d = f[0];
                                                t = new Swiff("http://www.facebook.com/v/" + d, {movie: "http://www.facebook.com/v/" + d, classid: "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000", width: B, height: o, params: {wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen}});
                                                p()
                                            } else {
                                                if (D.match(/flickr\.com/i)) {
                                                    i = "obj";
                                                    B = B || "500px";
                                                    o = o || "375px";
                                                    f = D.split("/");
                                                    d = f[5];
                                                    t = new Swiff("http://www.flickr.com/apps/video/stewart.swf", {id: d, classid: "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000", width: B, height: o, params: {flashvars: "photo_id=" + d + "&amp;show_info_box=" + A.flInfo, wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen}});
                                                    p()
                                                } else {
                                                    if (D.match(/gametrailers\.com/i)) {
                                                        i = "obj";
                                                        B = B || "480px";
                                                        o = o || "392px";
                                                        d = D.match(/\d{5}/g);
                                                        t = new Swiff("http://www.gametrailers.com/remote_wrap.php?mid=" + d, {id: d, width: B, height: o, params: {wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen}});
                                                        p()
                                                    } else {
                                                        if (D.match(/google\.com\/videoplay/i)) {
                                                            i = "obj";
                                                            B = B || "400px";
                                                            o = o || "326px";
                                                            f = D.split("=");
                                                            d = f[1];
                                                            t = new Swiff("http://video.google.com/googleplayer.swf?docId=" + d + "&autoplay=" + A.autoplayNum, {id: d, width: B, height: o, params: {wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen}});
                                                            p()
                                                        } else {
                                                            if (D.match(/megavideo\.com/i)) {
                                                                i = "obj";
                                                                B = B || "640px";
                                                                o = o || "360px";
                                                                f = D.split("=");
                                                                d = f[1];
                                                                t = new Swiff("http://wwwstatic.megavideo.com/mv_player.swf?v=" + d, {id: d, width: B, height: o, params: {wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen}});
                                                                p()
                                                            } else {
                                                                if (D.match(/metacafe\.com\/watch/i)) {
                                                                    i = "obj";
                                                                    B = B || "400px";
                                                                    o = o || "345px";
                                                                    f = D.split("/");
                                                                    d = f[4];
                                                                    t = new Swiff("http://www.metacafe.com/fplayer/" + d + "/.swf?playerVars=autoPlay=" + A.autoplayYes, {id: d, width: B, height: o, params: {wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen}});
                                                                    p()
                                                                } else {
                                                                    if (D.match(/vids\.myspace\.com/i)) {
                                                                        i = "obj";
                                                                        B = B || "425px";
                                                                        o = o || "360px";
                                                                        t = new Swiff(D, {id: d, width: B, height: o, params: {wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen}});
                                                                        p()
                                                                    } else {
                                                                        if (D.match(/revver\.com/i)) {
                                                                            i = "obj";
                                                                            B = B || "480px";
                                                                            o = o || "392px";
                                                                            f = D.split("/");
                                                                            d = f[4];
                                                                            t = new Swiff("http://flash.revver.com/player/1.0/player.swf?mediaId=" + d + "&affiliateId=" + A.revverID + "&allowFullScreen=" + A.revverFullscreen + "&autoStart=" + A.autoplay + "&backColor=#" + A.revverBack + "&frontColor=#" + A.revverFront + "&gradColor=#" + A.revverGrad + "&shareUrl=revver", {id: d, width: B, height: o, params: {wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen}});
                                                                            p()
                                                                        } else {
                                                                            if (D.match(/rutube\.ru/i)) {
                                                                                i = "obj";
                                                                                B = B || "470px";
                                                                                o = o || "353px";
                                                                                f = D.split("=");
                                                                                d = f[1];
                                                                                t = new Swiff("http://video.rutube.ru/" + d, {movie: "http://video.rutube.ru/" + d, width: B, height: o, params: {wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen}});
                                                                                p()
                                                                            } else {
                                                                                if (D.match(/seesmic\.com/i)) {
                                                                                    i = "obj";
                                                                                    B = B || "435px";
                                                                                    o = o || "355px";
                                                                                    f = D.split("/");
                                                                                    d = f[5];
                                                                                    t = new Swiff("http://seesmic.com/Standalone.swf?video=" + d, {id: d, width: B, height: o, params: {wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen}});
                                                                                    p()
                                                                                } else {
                                                                                    if (D.match(/tudou\.com/i)) {
                                                                                        i = "obj";
                                                                                        B = B || "400px";
                                                                                        o = o || "340px";
                                                                                        f = D.split("/");
                                                                                        d = f[5];
                                                                                        t = new Swiff("http://www.tudou.com/v/" + d, {width: B, height: o, params: {wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen}});
                                                                                        p()
                                                                                    } else {
                                                                                        if (D.match(/twitcam\.com/i)) {
                                                                                            i = "obj";
                                                                                            B = B || "320px";
                                                                                            o = o || "265px";
                                                                                            f = D.split("/");
                                                                                            d = f[3];
                                                                                            t = new Swiff("http://static.livestream.com/chromelessPlayer/wrappers/TwitcamPlayer.swf?hash=" + d, {width: B, height: o, params: {wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen}});
                                                                                            p()
                                                                                        } else {
                                                                                            if (D.match(/twitvid\.com/i)) {
                                                                                                i = "obj";
                                                                                                B = B || "600px";
                                                                                                o = o || "338px";
                                                                                                f = D.split("/");
                                                                                                d = f[3];
                                                                                                t = new Swiff("http://www.twitvid.com/player/" + d, {width: B, height: o, params: {wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen}});
                                                                                                p()
                                                                                            } else {
                                                                                                if (D.match(/ustream\.tv/i)) {
                                                                                                    i = "obj";
                                                                                                    B = B || "400px";
                                                                                                    o = o || "326px";
                                                                                                    t = new Swiff(D + "&amp;viewcount=" + A.usViewers + "&amp;autoplay=" + A.autoplay, {width: B, height: o, params: {wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen}});
                                                                                                    p()
                                                                                                } else {
                                                                                                    if (D.match(/youku\.com/i)) {
                                                                                                        i = "obj";
                                                                                                        B = B || "480px";
                                                                                                        o = o || "400px";
                                                                                                        f = D.split("id_");
                                                                                                        d = f[1];
                                                                                                        t = new Swiff("http://player.youku.com/player.php/sid/" + d + "=/v.swf", {width: B, height: o, params: {wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen}});
                                                                                                        p()
                                                                                                    } else {
                                                                                                        if (D.match(/youtube\.com\/watch/i)) {
                                                                                                            i = "obj";
                                                                                                            f = D.split("v=");
                                                                                                            d = f[1];
                                                                                                            if (d.match(/fmt=18/i)) {
                                                                                                                C = "&ap=%2526fmt%3D18";
                                                                                                                B = B || "560px";
                                                                                                                o = o || "345px"
                                                                                                            } else {
                                                                                                                if (d.match(/fmt=22/i)) {
                                                                                                                    C = "&ap=%2526fmt%3D22";
                                                                                                                    B = B || "640px";
                                                                                                                    o = o || "385px"
                                                                                                                } else {
                                                                                                                    C = A.ytQuality;
                                                                                                                    B = B || "480px";
                                                                                                                    o = o || "295px"
                                                                                                                }
                                                                                                            }
                                                                                                            t = new Swiff("http://www.youtube.com/v/" + d + "&autoplay=" + A.autoplayNum + "&fs=" + A.fullscreenNum + C + "&border=" + A.ytBorder + "&color1=0x" + A.ytColor1 + "&color2=0x" + A.ytColor2 + "&rel=" + A.ytRel + "&showinfo=" + A.ytInfo + "&showsearch=" + A.ytSearch, {id: d, width: B, height: o, params: {wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen}});
                                                                                                            p()
                                                                                                        } else {
                                                                                                            if (D.match(/youtube\.com\/view/i)) {
                                                                                                                i = "obj";
                                                                                                                f = D.split("p=");
                                                                                                                d = f[1];
                                                                                                                B = B || "480px";
                                                                                                                o = o || "385px";
                                                                                                                t = new Swiff("http://www.youtube.com/p/" + d + "&autoplay=" + A.autoplayNum + "&fs=" + A.fullscreenNum + C + "&border=" + A.ytBorder + "&color1=0x" + A.ytColor1 + "&color2=0x" + A.ytColor2 + "&rel=" + A.ytRel + "&showinfo=" + A.ytInfo + "&showsearch=" + A.ytSearch, {id: d, width: B, height: o, params: {wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen}});
                                                                                                                p()
                                                                                                            } else {
                                                                                                                if (D.match(/veoh\.com/i)) {
                                                                                                                    i = "obj";
                                                                                                                    B = B || "410px";
                                                                                                                    o = o || "341px";
                                                                                                                    D = D.replace("%3D", "/");
                                                                                                                    f = D.split("watch/");
                                                                                                                    d = f[1];
                                                                                                                    t = new Swiff("http://www.veoh.com/static/swf/webplayer/WebPlayer.swf?version=AFrontend.5.5.2.1001&permalinkId=" + d + "&player=videodetailsembedded&videoAutoPlay=" + A.AutoplayNum + "&id=anonymous", {id: d, width: B, height: o, params: {wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen}});
                                                                                                                    p()
                                                                                                                } else {
                                                                                                                    if (D.match(/viddler\.com/i)) {
                                                                                                                        i = "obj";
                                                                                                                        B = B || "437px";
                                                                                                                        o = o || "370px";
                                                                                                                        f = D.split("/");
                                                                                                                        d = f[4];
                                                                                                                        t = new Swiff(D, {id: "viddler_" + d, movie: D, classid: "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000", width: B, height: o, params: {wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen, id: "viddler_" + d, movie: D}});
                                                                                                                        p()
                                                                                                                    } else {
                                                                                                                        if (D.match(/viddyou\.com/i)) {
                                                                                                                            i = "obj";
                                                                                                                            B = B || "416px";
                                                                                                                            o = o || "312px";
                                                                                                                            f = D.split("=");
                                                                                                                            d = f[1];
                                                                                                                            t = new Swiff("http://www.viddyou.com/get/v2_" + A.vuPlayer + "/" + d + ".swf", {id: d, movie: "http://www.viddyou.com/get/v2_" + A.vuPlayer + "/" + d + ".swf", width: B, height: o, params: {wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen}});
                                                                                                                            p()
                                                                                                                        } else {
                                                                                                                            if (D.match(/vimeo\.com/i)) {
                                                                                                                                i = "obj";
                                                                                                                                B = B || "640px";
                                                                                                                                o = o || "360px";
                                                                                                                                f = D.split("/");
                                                                                                                                d = f[3];
                                                                                                                                t = new Swiff("http://www.vimeo.com/moogaloop.swf?clip_id=" + d + "&amp;server=www.vimeo.com&amp;fullscreen=" + A.fullscreenNum + "&amp;autoplay=" + A.autoplayNum + "&amp;show_title=" + A.vmTitle + "&amp;show_byline=" + A.vmByline + "&amp;show_portrait=" + A.vmPortrait + "&amp;color=" + A.vmColor, {id: d, width: B, height: o, params: {wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen}});
                                                                                                                                p()
                                                                                                                            } else {
                                                                                                                                if (D.match(/12seconds\.tv/i)) {
                                                                                                                                    i = "obj";
                                                                                                                                    B = B || "430px";
                                                                                                                                    o = o || "360px";
                                                                                                                                    f = D.split("/");
                                                                                                                                    d = f[5];
                                                                                                                                    t = new Swiff("http://embed.12seconds.tv/players/remotePlayer.swf", {id: d, width: B, height: o, params: {flashvars: "vid=" + d + "", wmode: A.wmode, bgcolor: A.bgcolor, allowscriptaccess: A.scriptaccess, allowfullscreen: A.fullscreen}});
                                                                                                                                    p()
                                                                                                                                } else {
                                                                                                                                    if (D.match(/\#mb_/i)) {
                                                                                                                                        i = "inline";
                                                                                                                                        B = B || A.defaultWidth;
                                                                                                                                        o = o || A.defaultHeight;
                                                                                                                                        URLsplit = D.split("#");
                                                                                                                                        t = document.id(URLsplit[1]).get("html");
                                                                                                                                        p()
                                                                                                                                    } else {
                                                                                                                                        i = "url";
                                                                                                                                        B = B || A.defaultWidth;
                                                                                                                                        o = o || A.defaultHeight;
                                                                                                                                        d = "mediaId_" + new Date().getTime();
                                                                                                                                        t = new Element("iframe", {src: D, id: d, width: B, height: o, frameborder: 0});
                                                                                                                                        p()
                                                                                                                                    }
                                                                                                                                }
                                                                                                                            }
                                                                                                                        }
                                                                                                                    }
                                                                                                                }
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return false
    }
    function p() {
        if (i == "img") {
            B = t.width;
            o = t.height;
            if (A.imgBackground) {
                j.setStyles({backgroundImage: "url(" + D + ")", display: ""})
            } else {
                if (o >= J - A.imgPadding && (o / J) >= (B / k)) {
                    o = J - A.imgPadding;
                    B = t.width = parseInt((o / t.height) * B);
                    t.height = o
                } else {
                    if (B >= k - A.imgPadding && (o / J) < (B / k)) {
                        B = k - A.imgPadding;
                        o = t.height = parseInt((B / t.width) * o);
                        t.width = B
                    }
                }
                if (Browser.Engine.trident) {
                    t = document.id(t)
                }
                t.addEvent("mousedown", function(X) {
                    X.stop()
                }).addEvent("contextmenu", function(X) {
                    X.stop()
                });
                j.setStyles({backgroundImage: "none", display: ""});
                t.inject(j)
            }
        } else {
            if (i == "obj") {
                if (Browser.Plugins.Flash.version < 8) {
                    j.setStyles({backgroundImage: "none", display: ""});
                    j.set("html", '<div id="mbError"><b>Error</b><br/>Adobe Flash is either not installed or not up to date, please visit <a href="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" title="Get Flash" target="_new">Adobe.com</a> to download the free player.</div>');
                    B = A.DefaultWidth;
                    o = A.DefaultHeight
                } else {
                    j.setStyles({backgroundImage: "none", display: ""});
                    t.inject(j)
                }
            } else {
                if (i == "qt") {
                    j.setStyles({backgroundImage: "none", display: ""});
                    t
                } else {
                    if (i == "inline") {
                        j.setStyles({backgroundImage: "none", display: ""});
                        j.set("html", t)
                    } else {
                        if (i == "url") {
                            j.setStyles({backgroundImage: "none", display: ""});
                            t.inject(j)
                        } else {
                            j.setStyles({backgroundImage: "none", display: ""});
                            j.set("html", '<div id="mbError"><b>Error</b><br/>A file type error has occoured, please visit <a href="iaian7.com/webcode/mediaboxAdvanced" title="mediaboxAdvanced" target="_new">iaian7.com</a> or contact the website author for more information.</div>');
                            B = A.defaultWidth;
                            o = A.defaultHeight
                        }
                    }
                }
            }
        }
        j.setStyles({width: B, height: o});
        E.set("html", (A.showCaption) ? U[0] : "");
        M.set("html", (A.showCaption && (U.length > 1)) ? U[1] : "");
        W.set("html", (A.showCounter && (h.length > 1)) ? A.counterText.replace(/{x}/, P + 1).replace(/{y}/, h.length) : "");
        if ((H >= 0) && (h[H][0].match(/\.gif|\.jpg|\.jpeg|\.png|twitpic\.com/i))) {
            z.src = h[H][0].replace(/twitpic\.com/i, "twitpic.com/show/full")
        }
        if ((O >= 0) && (h[O][0].match(/\.gif|\.jpg|\.jpeg|\.png|twitpic\.com/i))) {
            V.src = h[O][0].replace(/twitpic\.com/i, "twitpic.com/show/full")
        }
        B = j.offsetWidth;
        o = j.offsetHeight + c.offsetHeight;
        if (o >= n + n - 10) {
            F = -(n - 10)
        } else {
            F = -(o / 2)
        }
        if (B >= l + l - 10) {
            m = -(l - 10)
        } else {
            m = -(B / 2)
        }
        if (A.resizeOpening) {
            y.resize.start({width: B, height: o, marginTop: F, marginLeft: m})
        } else {
            b.setStyles({width: B, height: o, marginTop: F, marginLeft: m});
            R()
        }
    }
    function R() {
        y.image.start(1)
    }
    function I() {
        b.className = "";
        if (H >= 0) {
            T.style.display = ""
        }
        if (O >= 0) {
            e.style.display = ""
        }
        y.bottom.start(1)
    }
    function v() {
        if (t) {
            t.onload = $empty
        }
        y.resize.cancel();
        y.image.cancel().set(0);
        y.bottom.cancel().set(0);
        $$(T, e).setStyle("display", "none")
    }
    function N() {
        if (P >= 0) {
            t.onload = $empty;
            j.set("html", "");
            for (var X in y) {
                y[X].cancel()
            }
            b.setStyle("display", "none");
            y.overlay.chain(s).start(0)
        }
        return false
    }}
)();