import React from 'react';
import { View, Text, StyleSheet } from 'react-native';

export default function CoderScreen() {
  return (
    <View style={styles.container}>
      <Text style={styles.title}>Coder Tech Stack</Text>
      <Text style={styles.content}>
        - React Native{"\n"}
        - JavaScript{"\n"}
        - TypeScript{"\n"}
        - Node.js
      </Text>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#FDFCF7',
    alignItems: 'center',
    justifyContent: 'center',
  },
  title: {
    fontSize: 32,
    fontWeight: 'bold',
    color: '#0D9488', // Teal
    marginBottom: 20,
  },
  content: {
    fontSize: 18,
    color: '#333',
    // STRICTLY NO lineHeight
  }
});
