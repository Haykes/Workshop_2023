import 'package:flutter/material.dart';
import 'package:webview_flutter/webview_flutter.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'WebView App',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      home: MyHomePage(),
    );
  }
}

class MyHomePage extends StatelessWidget {
  final String serverUrl =
      "http://127.0.0.1:8000"; // L'URL de votre serveur Symfony en local

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(),
      body: WebView(
        initialUrl: serverUrl,
        javascriptMode: JavascriptMode.unrestricted,
        onWebViewCreated: (WebViewController webViewController) {
          // Utilisé pour des interactions supplémentaires avec le WebView si nécessaire.
        },
        onPageStarted: (String url) {
          // La page a commencé à charger.
        },
        onPageFinished: (String url) {
          // La page a fini de charger.
        },
        onWebResourceError: (WebResourceError error) {
          // Gérer les erreurs de chargement de la page ici.
        },
      ),
    );
  }
}
