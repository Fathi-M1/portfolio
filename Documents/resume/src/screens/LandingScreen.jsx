import React from 'react';
import { View, Text, StyleSheet, Pressable } from 'react-native';

export default function LandingScreen({ navigation }) {
  return (
    <View style={styles.container}>
      <Text style={styles.title}>Welcome to My Portfolio</Text>
      <Text style={styles.subtitle}>Hover or tap to explore</Text>
      
      <View style={styles.splitContainer}>
        {/* Designer Side */}
        <Pressable 
          style={[styles.side, styles.designerSide]}
          onHoverIn={() => navigation.navigate('Main', { screen: 'Designer' })}
          onPress={() => navigation.navigate('Main', { screen: 'Designer' })}
        >
          <Text style={styles.designerText}>Designer</Text>
        </Pressable>

        {/* Coder Side */}
        <Pressable 
          style={[styles.side, styles.coderSide]}
          onHoverIn={() => navigation.navigate('Main', { screen: 'Coder' })}
          onPress={() => navigation.navigate('Main', { screen: 'Coder' })}
        >
          <Text style={styles.coderText}>Coder</Text>
        </Pressable>
      </View>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#FDFCF7',
  },
  title: {
    fontSize: 32,
    fontWeight: 'bold',
    textAlign: 'center',
    marginTop: 60,
    color: '#333',
  },
  subtitle: {
    fontSize: 16,
    textAlign: 'center',
    color: '#666',
    marginBottom: 40,
    marginTop: 10,
  },
  splitContainer: {
    flex: 1,
    flexDirection: 'row',
  },
  side: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
  },
  designerSide: {
    backgroundColor: 'rgba(249, 115, 22, 0.05)', // Light orange tint
    borderRightWidth: 1,
    borderColor: '#eee',
  },
  coderSide: {
    backgroundColor: 'rgba(13, 148, 136, 0.05)', // Light teal tint
  },
  designerText: {
    fontSize: 36,
    fontWeight: '600',
    color: '#F97316', // Orange
  },
  coderText: {
    fontSize: 36,
    fontWeight: '600',
    color: '#0D9488', // Teal
  }
});
