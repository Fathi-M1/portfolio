import React from 'react';
import { View, Text, StyleSheet } from 'react-native';

export default function DesignerScreen() {
  return (
    <View style={styles.container}>
      <Text style={styles.title}>Designer Portfolio</Text>
      <Text style={styles.content}>
        - UI/UX Design{"\n"}
        - Glassmorphism{"\n"}
        - Brand Identity{"\n"}
        - Typography
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
    color: '#F97316', // Orange
    marginBottom: 20,
  },
  content: {
    fontSize: 18,
    color: '#333',
    // STRICTLY NO lineHeight
  }
});
